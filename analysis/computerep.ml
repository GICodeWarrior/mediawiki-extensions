(*

Copyright (c) 2007-2008 The Regents of the University of California
All rights reserved.

Authors: Luca de Alfaro, B. Thomas Adler, Vishwanath Raman

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice,
this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice,
this list of conditions and the following disclaimer in the documentation
and/or other materials provided with the distribution.

3. The names of the contributors may not be used to endorse or promote
products derived from this software without specific prior written
permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
POSSIBILITY OF SUCH DAMAGE.

 *)

(** Module Computerep 
    This module computes the reputation, and produces as output two lists, 
    of edit, and data, reputation evaluations *)

open Evaltypes;;
open Rephist;;

TYPE_CONV_PATH "UCSC_WIKI_RESEARCH"

let initial_reputation = 0.1
let debug = false
let single_debug = false
let single_debug_id = 57

(* Map on user ids = integers *)
module Umap = Map.Make (
  struct
    type t = int
    let compare: int -> int -> int = compare
  end);;

(* Hashtable look-alike, implemented on top of Map *)
module Table = struct
  let create _ = ref Umap.empty
  let add t k v = (t := Umap.add k v !t)
  let mem t k = Umap.mem k !t
  let find t k = Umap.find k !t
  let iter f t = Umap.iter f !t
end

(* The two choices below are: 
   Tbl = Hashtbl , to obtain a hashtable-based implementation;
   Tbl = Table , to obtain a map-based implementation. *)
module Tbl = Hashtbl

class users 
  (rep_scaling: float) 
  (max_rep: float)
  (include_domains: bool)
  (ip_nbytes: int)
  (user_history_file: out_channel option)
  (write_final_reps: bool)
  =
  object (self)
    val tbl = Tbl.create 1000000 

    (* This method, when called for anonymous users returns a user id generated
       from the user ip address, if we want to include user domains in computing
       reputation. It simply returns the user id passed in input, otherwise *)

    method private generate_user_id (uid: int) (ip_addr: string) : int =
      if (uid = 0 && include_domains) then begin
	let domain = ref 0 in
	let rec accumulate (i: int) (bytes: string list) : int =
	  if (i > 0) then begin
	    try
	      domain := !domain lsl 8;
	      domain := !domain lor int_of_string(List.hd bytes);
	      accumulate (i - 1) (List.tl bytes)
	    with _ -> !domain
	  end else !domain
	in
	-(accumulate ip_nbytes (Str.split (Str.regexp_string ".") ip_addr))
      end else uid

    method get_rep (uid: int) : float = 
      if uid = 0 then initial_reputation
      else begin
        if Tbl.mem tbl uid then begin
          let u = Tbl.find tbl uid in 
          (float_of_int u.rep) /. 100. 
        end else initial_reputation
      end

    method get_bin (uid: int) : int = 
      if uid = 0 then 0
      else begin
	if Tbl.mem tbl uid then begin
	  let u = Tbl.find tbl uid in u.rep_bin
	end else 0
      end

    method store_rep (uid: int) (r: float) (uname: string) : unit = 
      let new_bin = int_of_float (log (1.0 +. (max 0.0 r))) in
      let u = 
	if Tbl.mem tbl uid
	then Tbl.find tbl uid 
	else begin
	  let u' = {
	    rep = int_of_float (initial_reputation *. 100.);
	    rep_bin = new_bin;
	    username = uname
	  } in
	  Tbl.add tbl uid u';
	  u'
	end
      in
      let r_bounded = max 0. (min max_rep r) in
      let r_int = int_of_float (r_bounded *. 100.) in
      u.rep <- r_int;
      u.rep_bin <- new_bin


    method inc_rep (uid: int) (username: string) (q: float) (timestamp: Rephist.RepHistory.key) : unit = 
      let user_id = self#generate_user_id uid username in
      (* We do nothing for anon users (domain generate their own negative username) *)
      if user_id <> 0 then begin
	let u_rep = self#get_rep user_id in 
	let old_bin = self#get_bin user_id in
	if debug then Printf.printf "Uid %d rep: %f " user_id u_rep; 
	if debug then Printf.printf "inc: %f\n" (q /. rep_scaling);
	let new_rep = max 0. (min max_rep (u_rep +. (q /. rep_scaling))) in
	self#store_rep user_id new_rep username;
	if not write_final_reps then begin
	  match user_history_file with 
	    None -> ()
	  | Some f -> begin 
	      let new_bin = self#get_bin user_id in
	      Printf.fprintf f "%f %7d %2d %2d %f %S\n" 
		timestamp user_id old_bin new_bin new_rep username
	    end
	end;  (* If not write_final_reps *)
	if user_id = single_debug_id && single_debug then 
	  Printf.printf "Rep of %d: %f\n" user_id new_rep
      end 

    method get_weight (uid: int) : float = 
      let r = self#get_rep uid in 
      log (1.0 +. (max 0.0 r))
        
    method write_user_bins : unit =
      if write_final_reps then begin
	match user_history_file with 
	  None -> ()
	| Some f -> begin
	    let prt id u =
	      if u.rep_bin > 0 || u.rep > 0 then 
		Printf.fprintf f "%f %d %d %d %f %S\n" 0. id (-1) u.rep_bin ((float_of_int u.rep) /. 100.) u.username
	    in Tbl.iter prt tbl
	  end
      end
	
  end (* class users *)



class rep 
  (params: params_t) (* The parameters used for evaluation *)
  (include_anons: bool) (* Whether to include anonymous users in evaluation *)
  (rep_intv: time_intv_t) (* The interval of time for which reputation is computed *)
  (eval_intv: time_intv_t) (* The time interval for which reputation is evaluated *)
  (user_history_file: out_channel option) (* File where to write the history of user reputations *)
  (write_final_reps: bool) (* Write the reputations only at the end *)
  (print_monthly_stats: bool) (* Prints monthly precision and recall statistics *)
  (do_cumulative_months: bool) (* True if the monthly statistics have to be cumulative *)
  (do_localinc: bool) (* In EditInc, compares a revision only with the immediately preceding one *)
  (user_contrib_order_asc: bool) (* The order in which we write out author contributions *)
  (include_domains: bool) (* Indicates that we want to extract reputation for anonymous user domains *)
  (ip_nbytes: int) (* the number of bytes to use from the user ip address *)
  (output_channel: out_channel) (* Used to print automated stuff like monthly stats *)
  (use_reputation_cap: bool) (* use reputation cap *)
  (use_nix: bool) (* Use nixing by higher reputation authors *)
  (use_weak_nix: bool) (* Use nixing by anyone *)
  (nix_interval: float) (* interval in which we expect negative edits if any *)
  (n_edit_judging: int) (* n. of edit judges for each revision; used for nixing *)
  (gen_almost_truthful_rep: bool) (* use algorithm for almost truthful reputation *)
  (gen_truthful_rep: bool) (* use strict algorithm for truthful reputation only *)
  (do_compute_stats: bool) (* really computes statistics *)
  (robots: Read_robots.robot_set_t) (* Hash table of robot names *)
  =
object (self)
  (* This is the object keeping track of all users *)
  val user_data = new users params.rep_scaling params.max_rep include_domains ip_nbytes user_history_file write_final_reps
    (* These are for computing the statistics on the fly *)
  val mutable stat_text = new Computestats.stats params eval_intv
  val mutable stat_edit = new Computestats.stats params eval_intv
    (* Remembers the last month for which statistics were printed *)
  val mutable last_month = -1
    (* Remembers which revisions have been nixed *)
  val nixed : (int, unit) Hashtbl.t = Hashtbl.create 1000
    (* Which revisions were never nixed. *) 
  val not_nixed : (int, unit) Hashtbl.t = Hashtbl.create 1000

  method add_data (datum: wiki_data_t) : unit = 
    (* quality normalization function *)
    let normalize x = max (min x 1.0) (-. 1.0) in 
    (* Breaks apart the event time *)
    let date = 
      match datum with 
	EditLife e -> begin
	  if do_compute_stats then begin
            let uid = e.edit_life_uid0 in 
            if (uid <> 0 || include_anons || include_domains) 
	      && e.edit_life_delta > 0. 
              && e.edit_life_time >= rep_intv.start_time
              && e.edit_life_time <= rep_intv.end_time
            then begin
	      if debug then begin 
	        Printf.printf "EditLife T: %f rep_weight: %f data_weight: %f spec_q: %f\n" 
		  e.edit_life_time
		  (user_data#get_weight uid)
		  (e.edit_life_delta *. (float_of_int e.edit_life_n_judges))
		  (normalize e.edit_life_avg_specq) (* debug *)
	      end; 
	      stat_edit#add_event 
	        e.edit_life_time (* time of event *)
	        (user_data#get_weight uid) (* weight of user reputation *)
	        (e.edit_life_delta *. (float_of_int e.edit_life_n_judges)) (* weight of data point *)
	        (normalize e.edit_life_avg_specq); (* edit longevity *)
	    end
	  end; (* if gen_stats *)
	  e.edit_life_time
	end
      | TextLife t -> begin
	  if do_compute_stats then begin
            let uid = t.text_life_uid0 in 
            if (uid <> 0 || include_anons || include_domains)
              && t.text_life_time >= rep_intv.start_time
              && t.text_life_time <= rep_intv.end_time 
	      && t.text_life_new_text > 0 
	    then begin 
	      if debug then begin
		Printf.printf "Textlife T: %f rep_weight: %f data_weight: %f spec_q: %f\n"
		  t.text_life_time
		  (user_data#get_weight uid)
		  (float_of_int t.text_life_new_text)
		  (normalize t.text_life_text_decay) (* debug *)
	      end; 
	      stat_text#add_event 
		t.text_life_time
		(user_data#get_weight uid)
		(float_of_int t.text_life_new_text)
		(normalize t.text_life_text_decay)
	    end
	  end; (* if gen_stats *)
	  t.text_life_time
	end
      | EditInc e -> begin 
	  (* We do something only if the judging user is not a robot. *)
	  if not (Hashtbl.mem robots e.edit_inc_uname2) then begin 
	    let uid1 = e.edit_inc_uid1 in 
	    let uname1 = e.edit_inc_uname1 in
	    let revid1 = e.edit_inc_rev1 in 
	    (* Increments non-anonymous users or anonymous user domains, 
	       if delta > 0, and if it is in the time range *)
	    if (uid1 <> 0 || include_domains)
	      && e.edit_inc_d01 > 0.
	      && e.edit_inc_delta > 0.
	      && e.edit_inc_time >= rep_intv.start_time
	      && e.edit_inc_time <= rep_intv.end_time
	      && e.edit_inc_uid2 <> e.edit_inc_uid1 
	      && ((not do_localinc) || (do_localinc && e.edit_inc_n01 = 1))
	    then begin
	      let rep0 = user_data#get_rep e.edit_inc_uid0 in 
	      let rep1 = user_data#get_rep e.edit_inc_uid1 in 
	      let rep2 = user_data#get_rep e.edit_inc_uid2 in 
	      (* This is the specific quality based on the versions v0 v1 v2 *)
	      let spec_q = min 1.0 
		((e.edit_inc_d02 -. e.edit_inc_d12) /. e.edit_inc_d01)
	      in 
	      (* This is the specific quality based on the versions (v1 - 1) v1 v2 *)
	      let spec_q_p = min 1.0 
		((e.edit_inc_dp2 -. e.edit_inc_d12) /. e.edit_inc_delta)
	      in 

	      (* Decides nixing, on the basis of the d012 information *)
	      if use_nix then begin
		(* Yes, we are using robust reputation *)
		(* Decide whether we nix rev1 *)
		if (
		  (* Nix reason n. 1: negative feedback in the nixing interval *)
		  (* Unless the nix is weak, only higher reputation people can nix *)
		  (use_weak_nix && spec_q < 0. && e.edit_inc_t12 <= nix_interval) || 
		    (rep2 > rep1 && rep0 > rep1 && spec_q < 0. && e.edit_inc_t12 <= nix_interval) || 
		    (* Nix reason n. 2: too many edits in the nixing interval *)
		    ((e.edit_inc_n01 + e.edit_inc_n12 >= n_edit_judging) 
		      && (e.edit_inc_t01 +. e.edit_inc_t12) <= nix_interval)
		) then begin 
		  (* Nixes the revision *)
		  if not (Hashtbl.mem nixed revid1) then Hashtbl.add nixed revid1 ();
		  Hashtbl.remove not_nixed revid1
		end else begin 
		  if not ((Hashtbl.mem nixed revid1) && (Hashtbl.mem not_nixed revid1)) then 
		    Hashtbl.add not_nixed revid1 ()
		end
	      end; (* End of nixing portion *)

	      (* This is the quality to be used *)
	      let qual = 
		if gen_truthful_rep then begin 
		  (* Truthful reputation: counted only if n01 = 1 *)
		  if e.edit_inc_n01 = 1 then spec_q else 0.
		end else begin 
		  (* Not truthful rep. *)
		  if gen_almost_truthful_rep then (min spec_q spec_q_p) else spec_q
		end
	      in

	      if qual <> 0. then begin 

		(* Computes the reputation increment repinc *)
		let judge_w = user_data#get_weight e.edit_inc_uid2 in 
		let proposed_repinc = e.edit_inc_delta *. qual *. judge_w in 

		(* Computes the real reputation increment, that takes into account 
		   whether reputation-cap or reputation-cap-nix are used *)
		let real_repinc = 
		  if use_reputation_cap then begin 
		    (* If we use nixing, and the time rev1 to rev2 is greater that nixing interval, and the revision has not been nixed, 
		       then the increment is uncapped *)
		    if use_nix && (proposed_repinc < 0. || (e.edit_inc_t12 > nix_interval && (not (Hashtbl.mem nixed revid1))))
		    then proposed_repinc 
		    else begin 
		      (* We cap the reputation increment *)
		      let rep02 = min rep0 rep2 in 
		      let r_inc = min rep02 (proposed_repinc +. rep1) in 
		      let r_new = max rep1 r_inc in 
		      r_new -. rep1
		    end
		  end else begin 
		    (* standard, uncapped reputation *)
		    proposed_repinc 
		  end
		in 

		(* Increments the reputation *)
		if debug then Printf.printf "EditInc Uid %d q3 %f\n" uid1 real_repinc; (* debug *)
		user_data#inc_rep uid1 uname1 real_repinc e.edit_inc_time

	      end (* if qual <> 0 *)
	    end
	  end;  (* if not a robot *)
	  e.edit_inc_time 
      end
    | TextInc t -> t.text_inc_time
    in 
    (* Checks whether we have to print precision and recall at the end of the month *)
    if do_compute_stats then begin
      let (new_year, new_month, _, _, _, _) = Timeconv.float_to_time date in 
      if new_month <> last_month && print_monthly_stats then begin 
	last_month <- new_month; 
	let null_ch = open_out ("/dev/null") in 
	let se = stat_edit#compute_stats false null_ch in 
	let st = stat_text#compute_stats true  null_ch in 
	Printf.fprintf output_channel "%2d/%4d %f %12.1f %6.3f %7.5f %7.5f %12.1f %6.3f %7.5f %7.5f\n" 
	  new_month new_year date 
	  se.stat_total_weight se.stat_bad_perc se.stat_bad_precision se.stat_bad_recall 
	  st.stat_total_weight st.stat_bad_perc st.stat_bad_precision st.stat_bad_recall; 
	flush output_channel; 
	(* If the statistics are not cumulative, then resets them *)
	if not do_cumulative_months then begin
	  stat_text <- new Computestats.stats params eval_intv;
	  stat_edit <- new Computestats.stats params eval_intv
	end
      end
    end


  (* This method computes the statistics, and returns the edit_stats * text_stats *)
  method compute_stats (out_ch: out_channel) : stats_t * stats_t = 
    (* First writes all final user reputations. *)
    user_data#write_user_bins;
    let total_revs = (Hashtbl.length nixed) + (Hashtbl.length not_nixed) in
    Printf.fprintf out_ch "%d Revisions out of %d nixed -- %f percent."
      (Hashtbl.length nixed) total_revs (float_of_int (Hashtbl.length nixed) /.
        float_of_int total_revs) ;
    Printf.fprintf out_ch "\nEdit Stats:\n"; 
    let edit_s = stat_edit#compute_stats false out_ch in 
    Printf.fprintf out_ch "\nText Stats:\n";
    let text_s = stat_text#compute_stats true  out_ch in 
    (edit_s, text_s) 

end;; (* class rep *)
