(*

Copyright (c) 2007-2008 The Regents of the University of California
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

type match_quality_t = int * int * float
module type Elqt = sig type t = int * int * float val compare : t -> t -> int end
module OrderedMatch : Elqt
module PriorityQueue :
  sig
    exception Empty
    type 'a elt =
      'a Prioq.Make(OrderedMatch).elt = {
      mutable priority : OrderedMatch.t;
      mutable contents : 'a;
    }
    type 'a t =
      'a Prioq.Make(OrderedMatch).t = {
      mutable n : int;
      mutable a : 'a elt option array;
    }
    val create : unit -> 'a t
    val clear : 'a t -> unit
    val is_empty : 'a t -> bool
    val length : 'a t -> int
    val iter : (int -> OrderedMatch.t -> 'a -> unit) -> 'a t -> unit
    val add : 'a t -> 'a -> OrderedMatch.t -> 'a elt
    val take : 'a t -> 'a elt
  end
