(*

Copyright (c) 2007-2009 The Regents of the University of California
All rights reserved.

Authors: Luca de Alfaro

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


(** This class colorizes a wiki dump file according to text trust.
    Text trust is computed paying attention to syntactic text units,
    such as paragraphs and enumerations. *)

type word = string 
exception Ins_text_in_deleted_chunk
open Eval_defs

class page 
  (id: int)
  (title: string)
  (out_file: out_channel)
  (rep_histories: Rephist.rephist)
  (trust_coeff_lends_rep: float)
  (trust_coeff_read_all: float) 
  (trust_coeff_read_part: float) 
  (trust_coeff_local_decay: float)
  (trust_coeff_cut_rep_radius: float) 
  (trust_coeff_kill_decrease: float)
  (n_rev_to_color: int) 
  (equate_anons: bool) 
  (robots: Read_robots.robot_set_t)
  (edit_time_constant: float)
  =
  object (self) 
    inherit Trust_analysis.page 
      id title out_file rep_histories
      trust_coeff_lends_rep trust_coeff_read_all 
      trust_coeff_cut_rep_radius trust_coeff_kill_decrease
      n_rev_to_color equate_anons robots edit_time_constant

    (* Signatures of authors who raised the word trust *)
    val mutable chunks_authorsig_a : Author_sig.packed_author_signature_t array array = [| [| |] |] 

    (** This method evaluates the trust of the words of a new revision *)
    method private eval_newest : unit = 
      let rev_idx = (Vec.length revs) - 1 in 
      let rev = Vec.get rev_idx revs in 
      let uid = rev#get_user_id in 
      let rev_time = rev#get_time in 
      (* Gets the reputation of the author of the current revision *)
      let weight = rep_histories#get_weight uid rev_time in 
      let new_wl = rev#get_words in 
      (* Calls the function that analyzes the difference 
         between revisions. Data relative to the previous revision
         is stored in the instance fields chunks_a and chunks_attr_a *)
      let (new_chunks_a, medit_l) = Chdiff.text_tracking chunks_a new_wl in 
      (* Constructs new_chunks_trust_a, which contains the trust of each word 
	 in the text (both live text, and dead text). *)
      let weight_float = float_of_int weight in 

      (* Fixes the coefficients of trust incease depending on whether
	 the user is a bot... *)
      let (read_all', read_part') = 
	if Hashtbl.mem robots rev#get_user_name 
	then (0., 0.)
	else (trust_coeff_read_all, trust_coeff_read_part)
      in
      (* ...and depending on the time interval wrt. the previous edit *)
      let (read_all, read_part) =
	if rev_idx = 0
	then (read_all', read_part')
	else begin
	  let prev_rev = Vec.get (rev_idx - 1) revs in
	  let prev_time = prev_rev#get_time in
	  let delta_time = max 0. (rev_time -. prev_time) in
	  let time_factor = 1. -. exp (0. -. delta_time /. edit_time_constant) 
	  in
	  (read_all' *. time_factor, read_part' *. time_factor)
	end
      in
	
      let (new_chunks_trust_a, new_chunks_authorsig_a) = 
	Compute_robust_trust.compute_robust_trust 
	  chunks_trust_a chunks_authorsig_a new_chunks_a rev#get_seps medit_l
	  weight_float uid trust_coeff_lends_rep trust_coeff_kill_decrease 
	  trust_coeff_cut_rep_radius read_all 
	  read_part trust_coeff_local_decay in 

      (* Now, replaces chunks_trust_a and chunks_a for the next iteration *)
      chunks_trust_a <- new_chunks_trust_a;
      chunks_authorsig_a <- new_chunks_authorsig_a; 
      chunks_a <- new_chunks_a;
      (* Also notes in the revision the reputations *)
      rev#set_word_trust new_chunks_trust_a.(0)


  end (* page *)

