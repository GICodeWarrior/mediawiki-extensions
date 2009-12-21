(*

Copyright (c) 2007-2009 The Regents of the University of California
All rights reserved.

Authors: Luca de Alfaro, B. Thomas Adler, Ian Pye

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

open Eval_defs
open Online_types

type word = string 

(** This is the class used to represent revisions.  It is then extended 
    for various types of analysis *)

let approx_size_overhead = 200

class revision 
  (id: int) (* revision id *)
  (page_id: int) (* page id *)
  (timestamp: string) (* timestamp string *)
  (time: float) (* time, as a floating point *)

  (contributor: string) (* name of the contributor *)
  (user_id: int) (* user id *)
  (ip_addr: string) (* IP address *)
  (username: string) (* name of the user *)
  (is_minor: bool) 
  (comment: string)
  (text_init: string Vec.t) (* Text of the revision, still to be split into words *)
  (text_disarm: bool) 
  (text_rearm: bool)
  =
  object 
    val is_anon : bool = is_anonymous user_id
    val mutable words : word array = [| |]
      (* This is the new version of distance.  In revision k, 
         distance[j] refers to the distance between version k and k + j. *)
    val mutable distance: float Vec.t = Vec.empty 
      (* This Vec stores, in fashion similar to distance above, 
         the edit list to go from one version to the other *)
    val mutable editlist: Editlist.edit list Vec.t = Vec.empty 

    initializer begin
      words <- Text.split_into_words text_disarm text_rearm text_init
    end

    method get_words : word array = words
    method get_n_words : int = Array.length words
    method print_words : unit = begin Text.print_words words ; print_newline () end

    method get_distance: float Vec.t = distance
    method set_distance (v: float Vec.t) : unit = distance <- v
    method get_editlist: Editlist.edit list Vec.t = editlist
    method set_editlist (l: Editlist.edit list Vec.t) = editlist <- l 

    method get_time : float = time
    method get_timestamp : string = timestamp
    method get_id : int = id
    method get_ip : string = ip_addr 
    method get_page_id : int = page_id
    method get_user_id : int = user_id
    method get_user_name : string = 
      if is_anon then
        ip_addr
      else
        username
    method get_is_anon : bool = is_anon
    method get_is_minor : bool = is_minor
    method get_comment : string = comment

  end (* revision object *)

(** Tells me whether two revisions have the same author or not. 
    This cannot be a binary method, or else revision becomes a contravariant type, 
    and we cannot have subtypes of it any more. *)

let different_author 
    (equate_anons: bool) 
    (r  ) 
    (r' )
 (* (r': <get_user_id: int; get_ip: string; ..>) *)
    : bool = 
  let uid = r#get_user_id in 
  uid <> r'#get_user_id || ((not equate_anons) && r#get_is_anon && r#get_ip <> r'#get_ip)


(** This is a version of a revision object used just to write the revision out to a file*)
class write_only_revision 
  (id: int) (* revision id *)
  (page_id: int) (* page id *)
  (timestamp: string) (* timestamp string *)
  (time: float) (* time, as a floating point *)
  (contributor: string) (* name of the contributor *)
  (user_id: int) (* user id *)
  (ip_addr: string) (* IP address *)
  (username: string) (* name of the user *)
  (is_minor: bool) 
  (comment: string)
  (text_init: string Vec.t) (* Text of the revision, still to be split into words *)
  (text_disarm: bool)
  (text_rearm: bool)
  =
  
  object (self)
  
    inherit revision id page_id timestamp time contributor user_id ip_addr username is_minor comment text_init text_disarm text_rearm
    
    (* returns the size of the revision in bytes. 
        Assume that each char = 1 byte. *)
    method get_size =
      let size_text = 
	let size_n (l: int) (d: string) (r: int) : int = 
	  l + r + String.length d 
	in 
	Vec.visit_post 0 size_n text_init 
      in 
      size_text 
      + String.length timestamp
      + String.length ( contributor )
      + String.length ( comment )
      + String.length ( string_of_int id )
      + approx_size_overhead
  
    method output_revision trust_file = 
      (** This method is used to output the revision to an output file. *)
      (* prints standard stuff *)
      Printf.fprintf trust_file "<revision>\n<id>%d</id>\n" id; 
      Printf.fprintf trust_file "<timestamp>%s</timestamp>\n" timestamp;
      Printf.fprintf trust_file "<contributor>\n%s</contributor>\n" contributor;
      if is_minor then Printf.fprintf trust_file "<minor />\n";
      Printf.fprintf trust_file "<comment>%s</comment>\n" comment;
      Printf.fprintf trust_file "<text xml:space=\"preserve\">";
      (* Now we must write the text of the revision. 
         If there is no text, writes at least a \n, so that it is easier 
         for evalwiki to re-read the output. *)
      if text_init = Vec.empty 
      then output_string trust_file "\n</text>\n</revision>\n"
      else begin 
	let print_l (b: unit) (d: string) : unit = 
	  output_string trust_file d in 
	let print_r (c: unit) (b: unit) : unit = () in 
	Vec.visit_in () print_l print_r text_init;
	output_string trust_file "</text>\n</revision>\n"
      end
  end (* revision object *)
    

(** This is a version of a revision object used for author reputation evaluation *)
class reputation_revision 
  (id: int) (* revision id *)
  (page_id: int) (* page id *)
  (timestamp: string) (* timestamp string *)
  (time: float) (* time, as a floating point *)

  (contributor: string) (* name of the contributor *)
  (user_id: int) (* user id *)
  (ip_addr: string) (* IP address *)
  (username: string) (* name of the user *)
  (is_minor: bool) 
  (comment: string)
  (text_init: string Vec.t) (* Text of the revision, still to be split into words *)
  (text_disarm: bool)
  (text_rearm: bool)
  (n_edit_judging: int) 
  =
  object (self)
    inherit revision id page_id timestamp time contributor user_id ip_addr username is_minor comment text_init text_disarm text_rearm

    val mutable n_text_judge_revisions: int = 0 
    val mutable created_text: int = 0 
    val mutable total_life_text: int = 0 
    val dist: float array = Array.make (n_edit_judging + 1) 0.0

    method inc_n_text_judge_revisions : unit = 
      n_text_judge_revisions <- n_text_judge_revisions + 1
    method private get_n_text_judge_revisions : int = n_text_judge_revisions
    method inc_total_life_text (n: int) : unit = 
      total_life_text <- total_life_text + n 
    method get_total_life_text : int = total_life_text      
    method set_created_text (n: int) : unit = created_text <- n 
    method inc_created_text (n: int) : unit = created_text <- created_text + n 
    method get_created_text : int = created_text
      (* Delta from the previous revision *)
    val mutable delta = None 

    method set_delta (d: float) = delta <- Some d
    method get_delta : float option = delta
    (* Output method *)
    method print_text_life out_file =
      let n_judges = self#get_n_text_judge_revisions in 
      if n_judges > 0 then 
        Printf.fprintf out_file "\nTextLife %10.0f PageId: %d rev0: %d uid0: %d uname0: %S NJudges: %d NewText: %d Life: %d"
          self#get_time
          self#get_page_id
          self#get_id
          self#get_user_id
          self#get_user_name
          n_judges
          self#get_created_text
          self#get_total_life_text
  end (* reputation_revision *)


(** These are methods used to output the revision text, annotated with trust or trust and origin.
    These methods are used also by the on-line implementation, hence they do not belong to a specific 
    class. *)

let produce_annotated_markup 
  (seps: Text.sep_t array) (* the revision text *)
  (word_trust: float array) (* the revision word trust *)
  (word_origin: int array) (* the revision word origin *)
  (word_author: string array) (* the author of each word *)
  (trust_is_float: bool) (* flag indicating whether trust values have to be written out as floating-point *)
  (include_origin: bool) (* flag indicating whether we have to include also word origin *)
  (include_author: bool) (* flag indicating whether we have to include also word author *)
  : Buffer.t = 
  let out_buf = Buffer.create 10000 in 
  let curr_color = ref 0 in 
  let curr_origin = ref (-1) in 
  let curr_author = ref "" in
  let written_trust = ref false in
  (* approximates a float to an int *)
  let approx x = int_of_float (x +. 0.5) in 
  (* Gives me the reputation of the next word, if there is one *)
  let n_words = Array.length word_trust in 
  let next_word_color i = begin 
    if i < n_words 
    then word_trust.(i) 
    else if n_words > 0 
    then word_trust.(n_words - 1)
    else 0.0 (* No trust for empty pages. *) 
  end
  in 
  let next_word_origin i = begin 
    if i < n_words 
    then word_origin.(i) 
    else if n_words > 0 
    then word_origin.(n_words - 1)
    else 0
  end
  in 
  let next_word_author i = begin 
    if i < n_words
    then word_author.(i)
    else if n_words > 0
    then word_author.(n_words - 1)
    else ""
  end 
  in 
  (* Prints the tag.  [always_print] indicates that the tag
     must be printed even if the info has not changed. 
     [i] is the order of the word. *)
  let print_trust (always_print: bool) (i: int) : unit = begin 
    let new_color_float = next_word_color i in
    let new_color_int = approx new_color_float in 
    let new_origin = next_word_origin i in 
    let new_author = next_word_author i in
    (* Prints the tag if it has not just written it, and if one of these holds: 
       - trust_is_float holds
       - always_print holds
       - the info has changed. *)
    if (not !written_trust) &&
      (trust_is_float || always_print 
      || (new_color_int <> !curr_color) 
      || (include_origin && (new_origin <> !curr_origin))
      || (include_author && (new_author <> !curr_author))) then begin 
	begin 
	  (* writes trust *)
	  Buffer.add_string out_buf "{{#t:";
	  if trust_is_float
	  then Printf.bprintf out_buf "%.2f" new_color_float
	  else Buffer.add_string out_buf (string_of_int new_color_int)
	end;
	begin
	  (* writes origin *)
	  Buffer.add_char out_buf ',';
	  if include_origin
	  then Buffer.add_string out_buf (string_of_int new_origin)
	end;
	begin 
	  (* writes author *)
	  Buffer.add_char out_buf ',';
	  begin
	    if include_author
	    then Buffer.add_string out_buf new_author
	  end;
	  Buffer.add_string out_buf "}}"
	end;
	curr_color := new_color_int;
	curr_origin := new_origin;
	curr_author := new_author;
	written_trust := true;
      end (* Needs to print the tag. *)
  end
  in
  (* We remember for which word we last output the color. *)
  let word_idx = ref 0 in 
  (* This function f is iterated on the array *)
  let f (s: Text.sep_t) : unit = 
    match s with 
      (* Things that must be followed by the color, and increase the
	 word index *)
      Text.Title_start (t, i) | Text.Bullet (t, i) | Text.Indent (t, i) 
    | Text.Table_cell (t, i) | Text.Table_caption (t, i) -> begin 
	Buffer.add_string out_buf t; 
	word_idx := i + 1;
	written_trust := false;
	print_trust true !word_idx
      end
	(* Things that must be followed by the color *)
    | Text.Newline t -> begin 
	Buffer.add_string out_buf t;
	written_trust := false;
	print_trust true !word_idx
      end
        (* Things that are not followed by the color and do not
           increase the word index *)
    | Text.Space t | Text.Par_break t -> 
        Buffer.add_string out_buf t
	  (* Things that are not followed by the color, and increase
	     the word index *)
    | Text.Title_end (t, i) | Text.Table_line (t, i) 
    | Text.Redirect (t, i) | Text.Armored_char (t, i) -> begin 
	Buffer.add_string out_buf t; 
	word_idx := i + 1;
	written_trust := false
      end
        (* Things that are preceded and followed by the color, and
           increase the word index *)
    | Text.Tag (t, i) -> begin 
        print_trust true i;
        Buffer.add_string out_buf t; 
        word_idx := i + 1;
	written_trust := false;
	print_trust true !word_idx
      end
        (* Things that may be preceded by the color, if the color has
           changed. *)
    | Text.Word (t, i) -> begin 
	print_trust false i;
        Buffer.add_string out_buf t; 
        word_idx := i + 1;
	written_trust := false
      end
  in
  Array.iter f seps;
  out_buf;;


(** This is a version of a revision object used for author reputation and text trust evaluation *)
class trust_revision 
  (id: int) (* revision id *)
  (page_id: int) (* page id *)
  (timestamp: string) (* timestamp string *)
  (time: float) (* time, as a floating point *)

  (contributor: string) (* name of the contributor *)
  (user_id: int) (* user id *)
  (ip_addr: string) (* IP address *)
  (username: string) (* name of the user *)
  (is_minor: bool) 
  (comment: string)
  (text_init: string Vec.t) (* Text of the revision, still to be split into words *)
  (text_disarm: bool) (* Whether to disarm xml tags *)
  (text_rearm: bool) (* Whether to rearm xml tags *)
  =

  object (self)
    inherit revision id page_id timestamp time contributor user_id ip_addr username is_minor comment text_init text_disarm text_rearm

    val mutable seps  : Text.sep_t array = [| |]
    val mutable sep_word_idx : int array =  [| |]

    initializer begin
      let (t, swi, s) = Text.split_into_words_and_seps text_disarm text_rearm text_init
      in 
      words <- t;
      seps <- s;
      sep_word_idx <- swi
    end

    method get_words : word array = words
    method get_n_words : int = Array.length words
    method print_words : unit = begin Text.print_words words ; print_newline () end

    method get_seps : Text.sep_t array = seps 
    method get_sep_word_idx : int array = sep_word_idx 

    (* This is an array of word reputations *)
    val mutable word_trust : float array = [| |] 
    method set_word_trust (a: float array) : unit = word_trust <- a
    method get_word_trust : float array = word_trust

    (* This is an array of word origins *)
    val mutable word_origin : int array = [| |] 
    method set_word_origin (a: int array) : unit = word_origin <- a
    method get_word_origin : int array = word_origin

    (* This is an array of word authors *)
    val mutable word_author : string array = [| |]
    method set_word_author (a: string array) : unit = word_author <- a
    method get_word_author : string array = word_author

    (* This is an array of word sigs *)
    val mutable word_sig : Author_sig.packed_author_signature_t array = [| |]
    method set_word_sig a : unit = word_sig <- a
    method get_word_sig = word_sig

    method print_words_and_seps : unit = begin 
      Text.print_words_and_seps words seps;
      print_newline (); 
    end

    method output_rev_preamble trust_file = 
      (* prints standard stuff *)
      Printf.fprintf trust_file "<revision>\n<id>%d</id>\n" id; 
      Printf.fprintf trust_file "<timestamp>%s</timestamp>\n" timestamp;
      Printf.fprintf trust_file "<contributor>\n%s</contributor>\n" contributor;
      if is_minor then Printf.fprintf trust_file "<minor />\n";
      Printf.fprintf trust_file "<comment>%s</comment>\n" comment;
      Printf.fprintf trust_file "<text xml:space=\"preserve\">"

    method output_revision trust_file = 
      (** This method is used to output the revision to an output file. *)
      self#output_rev_preamble trust_file; 
      (* This function f is iterated on the array *)
      let f (s: Text.sep_t) : unit = 
        match s with 
	  Text.Title_start (t, _) | Text.Title_end (t, _) | Text.Par_break t
        | Text.Bullet (t, _) | Text.Indent (t, _) | Text.Space t | Text.Newline t
	| Text.Armored_char (t, _) | Text.Table_line (t, _) | Text.Table_cell (t, _)
	| Text.Table_caption (t, _) 
        | Text.Tag (t, _) | Text.Redirect (t, _) | Text.Word (t, _) -> 
	    output_string trust_file t
      in
      Array.iter f seps;
      output_string trust_file "</text>\n</revision>\n"


    method private output_rev_text (include_origin: bool) (include_author: bool) trust_file = 
      (** This method is used to output the colorized version of a 
          revision to an output file. *)
      self#output_rev_preamble trust_file; 
      (* Now we must write the text of the revision.  Note that we do not write the
         author information, as we do not have it.*)
      Buffer.output_buffer trust_file
        (produce_annotated_markup seps word_trust word_origin word_author false 
	  include_origin include_author);
      output_string trust_file "</text>\n</revision>\n"

    method output_trust_revision = self#output_rev_text false false

    method output_trust_origin_revision = self#output_rev_text true false

    (** This method returns the colored text of a revision, ready to be written to disk
	as a compressed file.  The text is returned with author, origin, trust information
	included. *)
    method get_colored_text : string = 
      Buffer.contents (produce_annotated_markup seps word_trust word_origin word_author
	false true true)

    (** Returns the signature of the revision. *)
    method get_sig : sig_t = {
      words_a = words;
      trust_a = word_trust;
      origin_a = word_origin;
      author_a = word_author;
      sig_a = word_sig
    }

  end (* revision object *)

