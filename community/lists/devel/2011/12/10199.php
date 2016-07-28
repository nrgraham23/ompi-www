<?
$subject_val = "Re: [OMPI devel] Fwd: Troubles using MPI_Isend/MPI_Irecv/MPI_Waitany and MPI_Allreduce";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Dec 22 05:01:40 2011" -->
<!-- isoreceived="20111222100140" -->
<!-- sent="Thu, 22 Dec 2011 10:01:33 +0000" -->
<!-- isosent="20111222100133" -->
<!-- name="Pedro Gonnet" -->
<!-- email="gonnet_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Fwd: Troubles using MPI_Isend/MPI_Irecv/MPI_Waitany and MPI_Allreduce" -->
<!-- id="1324548093.1981.53.camel_at_laika" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="[OMPI devel] Fwd: Troubles using MPI_Isend/MPI_Irecv/MPI_Waitany and MPI_Allreduce" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI devel] Fwd: Troubles using MPI_Isend/MPI_Irecv/MPI_Waitany and MPI_Allreduce<br>
<strong>From:</strong> Pedro Gonnet (<em>gonnet_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-12-22 05:01:33
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10200.php">Louis Valmeras: "[OMPI devel] Impossible to find static-compoents.h"</a>
<li><strong>Previous message:</strong> <a href="10198.php">Paul H. Hargrove: "Re: [OMPI devel] autogen.sh generates broken configure on FreeBSD-8.2"</a>
<li><strong>Maybe in reply to:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2011/10/9875.php">Pedro Gonnet: "[OMPI devel] Fwd: Troubles using MPI_Isend/MPI_Irecv/MPI_Waitany and MPI_Allreduce"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Hi George,
<br>
<p>In the code I'm working on I actually have concurrent MPI_Waitany calls
<br>
on the same set of requests. Oops. All clear now.
<br>
<p>Cheers,
<br>
Pedro
<br>
<p><p><span class="quotelev1">&gt; I checked the wait_any code, and I can only see one possible execution
</span><br>
<span class="quotelev1">&gt; path to return MPI_UNDEFINED. All requests have to be marked as
</span><br>
<span class="quotelev1">&gt; inactive, which only happens after the OMPI request completion
</span><br>
<span class="quotelev1">&gt; function is called. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; This lead to the following question. Are your threads waiting on
</span><br>
<span class="quotelev1">&gt; common requests or each one of them only waits on a non-overlapping
</span><br>
<span class="quotelev1">&gt; subset? BTW, the MPI standard strictly forbids two concurrent
</span><br>
<span class="quotelev1">&gt; wait/test operations on the same request. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;   george. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Dec 20, 2011, at 07:31 , Pedro Gonnet wrote: 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; Hi again, 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; I have a follow-up question. I have been using MPI_Init_thread and 
</span><br>
<span class="quotelev2">&gt; &gt; MPI_Isend/MPI_Irecv/MPI_Waitany for a while now and have stubled
</span><br>
<span class="quotelev1">&gt; over 
</span><br>
<span class="quotelev2">&gt; &gt; what may be a but in MPI_Waitany... 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; Within a parallel region of the code (in this case I am using
</span><br>
<span class="quotelev1">&gt; OpenMP), 
</span><br>
<span class="quotelev2">&gt; &gt; calls to MPI_Isend and MPI_Irecv work find. If, however, I have
</span><br>
<span class="quotelev1">&gt; several 
</span><br>
<span class="quotelev2">&gt; &gt; threads calling MPI_Waitany at the same time, some of the calls
</span><br>
<span class="quotelev1">&gt; will 
</span><br>
<span class="quotelev2">&gt; &gt; return with an index MPI_UNDEFINED although there are still recvs 
</span><br>
<span class="quotelev2">&gt; &gt; waiting. 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; In OpenMP, if I wrap the calls to MPI_Waitany in a &quot;#pragma omp 
</span><br>
<span class="quotelev2">&gt; &gt; critical&quot;, everything works just fine. 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; The reason I'm calling these functions in a parallel context is
</span><br>
<span class="quotelev1">&gt; that 
</span><br>
<span class="quotelev2">&gt; &gt; although MPI_Isend/MPI_Irecv are asynchronous, work (communication)
</span><br>
<span class="quotelev1">&gt; only 
</span><br>
<span class="quotelev2">&gt; &gt; seems to get done when I call MPI_Waitany. I therefore spawn
</span><br>
<span class="quotelev1">&gt; several 
</span><br>
<span class="quotelev2">&gt; &gt; threads which deal with the received data in turn, filling the
</span><br>
<span class="quotelev1">&gt; voids 
</span><br>
<span class="quotelev2">&gt; &gt; caused by communication. Oh, and all of this goes on while other
</span><br>
<span class="quotelev1">&gt; threads 
</span><br>
<span class="quotelev2">&gt; &gt; compute other things in the background. 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; Could it be that there is a concurrency bug in MPI_Waitany? 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; Cheers, 
</span><br>
<span class="quotelev2">&gt; &gt; Pedro 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Sorry for the delay -- I just replied on the users list. I think
</span><br>
<span class="quotelev1">&gt; you 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; need to use MPI_INIT_THREAD with MPI_THREAD_MULTIPLE. See if that 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; helps. 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; On Oct 26, 2011, at 7:19 AM, Pedro Gonnet wrote: 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Hi all, 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; I'm forwarding this message from the &quot;users&quot; mailing list as it 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; wasn't 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; getting any attention there and I believe this is a bona-fide
</span><br>
<span class="quotelev1">&gt; bug. 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; The issue is that if an MPI node has two threads, one exchanging 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; data 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; with other nodes through the non-blocking routines, the other 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; exchanging 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; data with MPI_Allreduce, the system hangs. 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; The attached example program reproduces this bug. It can be
</span><br>
<span class="quotelev1">&gt; compiled 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; and 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; run using the following: 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; mpicc -g -Wall mpitest.c -pthread 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; mpirun -np 8 xterm -e gdb -ex run ./a.out 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Note that you may need to fiddle with the delay in line 146 to 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; reproduce 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; the problem. 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Many thanks, 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Pedro 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; -------- Forwarded Message -------- 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; From: Pedro Gonnet &lt;gonnet_at_[hidden]&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; To: users &lt;users_at_[hidden]&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Subject: Re: Troubles using MPI_Isend/MPI_Irecv/MPI_Waitany and 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; MPI_Allreduce 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Date: Sun, 23 Oct 2011 18:11:50 +0100 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Hi again, 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; As promised, I implemented a small program reproducing the error. 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; The program's main routine spawns a pthread which calls the 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; function 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; &quot;exchange&quot;. &quot;exchange&quot; uses MPI_Isend/MPI_Irecv/MPI_Waitany to 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; exchange 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; a buffer of double-precision numbers with all other nodes. 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; At the same time, the &quot;main&quot; routine exchanges the sum of all the 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; buffers using MPI_Allreduce. 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; To compile and run the program, do the following: 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; mpicc -g -Wall mpitest.c -pthread 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; mpirun -np 8 ./a.out 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Timing is, of course, of the essence and you may have to run the 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; program 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; a few times or twiddle with the value of &quot;usleep&quot; in line 146 for
</span><br>
<span class="quotelev1">&gt; it 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; to 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; hang. To see where things go bad, you can do the following 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; mpirun -np 8 xterm -e gdb -ex run ./a.out 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Things go bad when MPI_Allreduce is called while any of the
</span><br>
<span class="quotelev1">&gt; threads 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; are 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; in MPI_Waitany. The value of &quot;usleep&quot; in line 146 should be long 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; enough 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; for all the nodes to have started exchanging data but small
</span><br>
<span class="quotelev1">&gt; enough 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; so 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; that they are not done yet. 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Cheers, 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Pedro 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; On Thu, 2011-10-20 at 11:25 +0100, Pedro Gonnet wrote: 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; Short update: 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; I just installed version 1.4.4 from source (compiled with 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; --enable-mpi-threads), and the problem persists. 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; I should also point out that if, in thread (ii), I wait for the 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; nonblocking communication in thread (i) to finish, nothing bad 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; happens. 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; But this makes the nonblocking communication somewhat pointless. 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; Cheers, 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; Pedro 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; On Thu, 2011-10-20 at 10:42 +0100, Pedro Gonnet wrote: 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; Hi all, 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; I am currently working on a multi-threaded hybrid parallel 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; simulation 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; which uses both pthreads and OpenMPI. The simulation uses
</span><br>
<span class="quotelev1">&gt; several 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; pthreads per MPI node. 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; My code uses the nonblocking routines 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; MPI_Isend/MPI_Irecv/MPI_Waitany 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; quite successfully to implement the node-to-node communication. 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; When I 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; try to interleave other computations during this communication, 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; however, 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; bad things happen. 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; I have two MPI nodes with two threads each: one thread (i)
</span><br>
<span class="quotelev1">&gt; doing 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; the 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; nonblocking communication and the other (ii) doing other 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; computations. 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; At some point, the threads (ii) need to exchange data using 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; MPI_Allreduce, which fails if the first thread (i) has not 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; completed all 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; the communication, i.e. if thread (i) is still in MPI_Waitany. 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; Using the in-place MPI_Allreduce, I get a re-run of this bug: 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/community/lists/users/2011/09/17432.php">http://www.open-mpi.org/community/lists/users/2011/09/17432.php</a>. 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; If I 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; don't use in-place, the call to MPI_Waitany (thread ii) on one
</span><br>
<span class="quotelev1">&gt; of 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; the 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; MPI nodes waits forever. 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; My guess is that when the thread (ii) calls MPI_Allreduce, it 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; gets 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; whatever the other node sent with MPI_Isend to thread (i),
</span><br>
<span class="quotelev1">&gt; drops 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; whatever it should have been getting from the other node's 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; MPI_Allreduce, and the call to MPI_Waitall hangs. 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; Is this a known issue? Is MPI_Allreduce not designed to work 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; alongside 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; the nonblocking routines? Is there a &quot;safe&quot; variant of 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; MPI_Allreduce I 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; should be using instead? 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; I am using OpenMPI version 1.4.3 (version 1.4.3-1ubuntu3 of the 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; package 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; openmpi-bin in Ubuntu). Both MPI nodes are run on the same 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; dual-core 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; computer (Lenovo x201 laptop). 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; If you need more information, please do let me know! I'll also
</span><br>
<span class="quotelev1">&gt; try 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; to 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; cook-up a small program reproducing this problem... 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; Cheers and kind regards, 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; Pedro 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt; &gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; &lt;mpitest.c&gt;_______________________________________________ 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; devel mailing list 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; devel_at_[hidden] 
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; -- 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Jeff Squyres 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; jsquyres_at_[hidden] 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; For corporate legal information go to: 
</span><br>
<span class="quotelev3">&gt; &gt;&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a> 
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________ 
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list 
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden] 
</span><br>
<span class="quotelev2">&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10200.php">Louis Valmeras: "[OMPI devel] Impossible to find static-compoents.h"</a>
<li><strong>Previous message:</strong> <a href="10198.php">Paul H. Hargrove: "Re: [OMPI devel] autogen.sh generates broken configure on FreeBSD-8.2"</a>
<li><strong>Maybe in reply to:</strong> <a href="http://www.open-mpi.org/community/lists/devel/2011/10/9875.php">Pedro Gonnet: "[OMPI devel] Fwd: Troubles using MPI_Isend/MPI_Irecv/MPI_Waitany and MPI_Allreduce"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
