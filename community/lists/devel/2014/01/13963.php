<?
$subject_val = "Re: [OMPI devel] Intermittent mpirun crash?";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Jan 30 14:59:32 2014" -->
<!-- isoreceived="20140130195932" -->
<!-- sent="Thu, 30 Jan 2014 11:59:08 -0800" -->
<!-- isosent="20140130195908" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Intermittent mpirun crash?" -->
<!-- id="C9270D79-A6AD-4D8A-8434-C68C4A23AEEE_at_open-mpi.org" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="3AF945EBF4D3EC41AFE44EED9B0585F36019A6085B_at_HQMAIL02.nvidia.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Intermittent mpirun crash?<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-01-30 14:59:08
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="13964.php">Ren� Oertel: "[OMPI devel] Don't try to call orte_show_help() before orte_init() succeeds"</a>
<li><strong>Previous message:</strong> <a href="13962.php">Barrett, Brian W: "Re: [OMPI devel] [EXTERNAL]  SPARC V8+ question"</a>
<li><strong>In reply to:</strong> <a href="13961.php">Rolf vandeVaart: "Re: [OMPI devel] Intermittent mpirun crash?"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Sure! cmr it across to v1.7.4 and we'll add it before we release
<br>
<p>Thanks!
<br>
Ralph
<br>
<p>On Jan 30, 2014, at 11:53 AM, Rolf vandeVaart &lt;rvandevaart_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; I ran mpirun through valgrind and I got some strange complaints about an issue with thread 2.  I hunted around mpirun code and I see that we start a thread, but we never have it finish during shutdown.  Therefore, I added this snippet of code (probably in the wrong place) and I no longer see my intermittent crashes.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Ralph, what do you think?  Does this seem reasonable?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Rolf
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; [rvandevaart_at_drossetti-ivy0 ompi-v1.7]$ svn diff
</span><br>
<span class="quotelev1">&gt; Index: orte/mca/oob/tcp/oob_tcp_component.c
</span><br>
<span class="quotelev1">&gt; ===================================================================
</span><br>
<span class="quotelev1">&gt; --- orte/mca/oob/tcp/oob_tcp_component.c	(revision 30500)
</span><br>
<span class="quotelev1">&gt; +++ orte/mca/oob/tcp/oob_tcp_component.c	(working copy)
</span><br>
<span class="quotelev1">&gt; @@ -631,6 +631,10 @@
</span><br>
<span class="quotelev1">&gt;     opal_output_verbose(2, orte_oob_base_framework.framework_output,
</span><br>
<span class="quotelev1">&gt;                         &quot;%s TCP SHUTDOWN&quot;,
</span><br>
<span class="quotelev1">&gt;                         ORTE_NAME_PRINT(ORTE_PROC_MY_NAME));
</span><br>
<span class="quotelev1">&gt; +    if (ORTE_PROC_IS_HNP) {
</span><br>
<span class="quotelev1">&gt; +        mca_oob_tcp_component.listen_thread_active = 0;
</span><br>
<span class="quotelev1">&gt; +        opal_thread_join(&amp;mca_oob_tcp_component.listen_thread, NULL);
</span><br>
<span class="quotelev1">&gt; +    }
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;     while (NULL != (item = opal_list_remove_first(&amp;mca_oob_tcp_component.listeners))) {
</span><br>
<span class="quotelev1">&gt;         OBJ_RELEASE(item);
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; -----Original Message-----
</span><br>
<span class="quotelev2">&gt;&gt; From: devel [mailto:devel-bounces_at_[hidden]] On Behalf Of Ralph
</span><br>
<span class="quotelev2">&gt;&gt; Castain
</span><br>
<span class="quotelev2">&gt;&gt; Sent: Thursday, January 30, 2014 12:35 PM
</span><br>
<span class="quotelev2">&gt;&gt; To: Open MPI Developers
</span><br>
<span class="quotelev2">&gt;&gt; Subject: Re: [OMPI devel] Intermittent mpirun crash?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; That option might explain why your test process is failing (which segfaulted as
</span><br>
<span class="quotelev2">&gt;&gt; well), but obviously wouldn't have anything to do with mpirun
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Jan 30, 2014, at 9:29 AM, Rolf vandeVaart &lt;rvandevaart_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I just retested with --mca mpi_leave_pinned 0 and that made no difference.
</span><br>
<span class="quotelev2">&gt;&gt; I still see the mpirun crash.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; -----Original Message-----
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; From: devel [mailto:devel-bounces_at_[hidden]] On Behalf Of George
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Bosilca
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Sent: Thursday, January 30, 2014 11:59 AM
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; To: Open MPI Developers
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Subject: Re: [OMPI devel] Intermittent mpirun crash?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I got something similar 2 days ago, with a large software package
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; abusing of MPI_Waitany/MPI_Waitsome (that was working seamlessly a
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; month ago). I had to find a quick fix. Upon figuring out that turning
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; the leave_pinned off fixes the problem, I did not investigate any further.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Do you see a similar behavior?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; George.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Jan 30, 2014, at 17:26 , Rolf vandeVaart &lt;rvandevaart_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I am seeing this happening to me very intermittently.  Looks like
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; mpirun is
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; getting a SEGV.  Is anyone else seeing this?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; This is 1.7.4 built yesterday.  (Note that I added some stuff to
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; what is being printed out so the message is slightly different than
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 1.7.4
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; output)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; mpirun - -np 6 -host
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; drossetti-ivy0,drossetti-ivy1,drossetti-ivy2,drossetti-ivy3 --mca
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; btl_openib_warn_default_gid_prefix 0  --  `pwd`/src/MPI_Waitsome_p_c
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; MPITEST info  (0): Starting:  MPI_Waitsome_p:  Persistent Waitsome
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; using two nodes
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; MPITEST_results: MPI_Waitsome_p:  Persistent Waitsome using two
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; nodes all tests PASSED (742) [drossetti-ivy0:10353] *** Process
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; (mpirun)received signal *** [drossetti-ivy0:10353] Signal:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Segmentation fault (11) [drossetti-ivy0:10353] Signal code: Address
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; not mapped (1) [drossetti-ivy0:10353] Failing at address:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 0x7fd31e5f208d [drossetti-ivy0:10353] End of signal information -
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; not sleeping
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; gmake[1]: *** [MPI_Waitsome_p_c] Segmentation fault (core dumped)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; gmake[1]: Leaving directory `/geppetto/home/rvandevaart/public/ompi-
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; tests/trunk/intel_tests'
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; (gdb) where
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; #0  0x00007fd31f620807 in ?? () from /lib64/libgcc_s.so.1
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; #1  0x00007fd31f6210b9 in _Unwind_Backtrace () from
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; /lib64/libgcc_s.so.1
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; #2  0x00007fd31fb2893e in backtrace () from /lib64/libc.so.6
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; #3  0x00007fd320b0d622 in opal_backtrace_buffer
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; (message_out=0x7fd31e5e33a0, len_out=0x7fd31e5e33ac)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  at
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ../../../../../opal/mca/backtrace/execinfo/backtrace_execinfo.c:57
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; #4  0x00007fd320b0a794 in show_stackframe (signo=11,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; info=0x7fd31e5e3930, p=0x7fd31e5e3800) at
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ../../../opal/util/stacktrace.c:354
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; #5  &lt;signal handler called&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; #6  0x00007fd31e5f208d in ?? ()
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; #7  0x00007fd31e5e46d8 in ?? ()
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; #8  0x000000000000c2a8 in ?? ()
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; #9  0x0000000000000000 in ?? ()
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ------------- This email message is for the sole use of the intended
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; recipient(s) and may contain confidential information.  Any
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; unauthorized review, use, disclosure or distribution is prohibited.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; If you are not the intended recipient, please contact the sender by
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; reply email and destroy all copies of the original message.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ------------- _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="13964.php">Ren� Oertel: "[OMPI devel] Don't try to call orte_show_help() before orte_init() succeeds"</a>
<li><strong>Previous message:</strong> <a href="13962.php">Barrett, Brian W: "Re: [OMPI devel] [EXTERNAL]  SPARC V8+ question"</a>
<li><strong>In reply to:</strong> <a href="13961.php">Rolf vandeVaart: "Re: [OMPI devel] Intermittent mpirun crash?"</a>
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
