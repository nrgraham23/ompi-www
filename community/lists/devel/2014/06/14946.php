<?
$subject_val = "Re: [OMPI devel] Intermittent hangs when exiting with error";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Jun  2 07:50:30 2014" -->
<!-- isoreceived="20140602115030" -->
<!-- sent="Mon, 2 Jun 2014 11:50:29 +0000" -->
<!-- isosent="20140602115029" -->
<!-- name="Jeff Squyres (jsquyres)" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Intermittent hangs when exiting with error" -->
<!-- id="CF872D54-5625-4EA9-A073-D0213FE092CA_at_cisco.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="CAAkFZ5tECKb_xoFQsthpP4N4RVxPZTzgL+biTv0Xfqjw8pgg2A_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Intermittent hangs when exiting with error<br>
<strong>From:</strong> Jeff Squyres (jsquyres) (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-06-02 07:50:29
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14947.php">Gilles Gouaillardet: "Re: [OMPI devel] trunk failure"</a>
<li><strong>Previous message:</strong> <a href="14945.php">Mike Dubman: "Re: [OMPI devel] trunk failure"</a>
<li><strong>In reply to:</strong> <a href="14943.php">Gilles Gouaillardet: "Re: [OMPI devel] Intermittent hangs when exiting with error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14953.php">Gilles Gouaillardet: "Re: [OMPI devel] Intermittent hangs when exiting with error"</a>
<li><strong>Reply:</strong> <a href="14953.php">Gilles Gouaillardet: "Re: [OMPI devel] Intermittent hangs when exiting with error"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I'm AFK but let me reply about the IB thing: double ports/multi rail is a good thing. It's not a good thing if they're on the same subnet.
<br>
<p>Check the FAQ - <a href="http://www.open-mpi.org/faq/?category=openfabrics">http://www.open-mpi.org/faq/?category=openfabrics</a> - I can't see it well enough on the small screen of my phone, but I think there's a q on there about how multi rail destinations are chosen.
<br>
<p>Spoiler: put your ports in different subnets so that OMPI makes deterministic choices.
<br>
<p>Sent from my phone. No type good.
<br>
<p>On Jun 2, 2014, at 6:55 AM, &quot;Gilles Gouaillardet&quot; &lt;gilles.gouaillardet_at_[hidden]&lt;mailto:gilles.gouaillardet_at_[hidden]&gt;&gt; wrote:
<br>
<p>Jeff,
<br>
<p>On Mon, Jun 2, 2014 at 7:26 PM, Jeff Squyres (jsquyres) &lt;jsquyres_at_[hidden]&lt;mailto:jsquyres_at_[hidden]&gt;&gt; wrote:
<br>
On Jun 2, 2014, at 5:03 AM, Gilles Gouaillardet &lt;gilles.gouaillardet_at_[hidden]&lt;mailto:gilles.gouaillardet_at_[hidden]&gt;&gt; wrote:
<br>
<p><span class="quotelev1">&gt; i faced a bit different problem, but that is 100% reproductible :
</span><br>
<span class="quotelev1">&gt; - i launch mpirun (no batch manager) from a node with one IB port
</span><br>
<span class="quotelev1">&gt; - i use -host node01,node02 where node01 and node02 both have two IB port on the
</span><br>
<span class="quotelev1">&gt;   same subnet
</span><br>
<p>FWIW: 2 IB ports on the same subnet?  That's not a good idea.
<br>
<p>could you please elaborate a bit ?
<br>
from what i saw, this basically doubles the bandwidth (imb PingPong benchmark) between two nodes (!) which is a not a bad thing.
<br>
i can only guess this might not scale (e.g. if 16 tasks is running on each host, the overhead associated with the use of two ports might void the extra bandwidth)
<br>
<p><span class="quotelev1">&gt; by default, this will hang.
</span><br>
<p>...but it still shouldn't hang.  I wonder if it's somehow related to <a href="https://svn.open-mpi.org/trac/ompi/ticket/4442">https://svn.open-mpi.org/trac/ompi/ticket/4442</a>...?
<br>
<p>&nbsp;i doubt it ...
<br>
<p>here is my command line (from node0)
<br>
`which mpirun` -np 2 -host node1,node2 --mca rtc_freq_priority 0 --mca btl openib,self --mca btl_openib_if_include mlx4_0 ./abort
<br>
on top of that, the usnic btl is not built (nor installed)
<br>
<p><p><span class="quotelev1">&gt; if this is a &quot;feature&quot; (e.g. openmpi does not support this kind of configuration) i am fine with it.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; when i run mpirun --mca btl_openib_if_exclude mlx4_1, then if the application is a success, then it works just fine.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; if the application calls MPI_Abort() /* and even if all tasks call MPI_Abort() */ then it will hang 100% of the time.
</span><br>
<span class="quotelev1">&gt; i do not see that as a feature but as a bug.
</span><br>
<p>Yes, OMPI should never hang upon a call to MPI_Abort.
<br>
<p>Can you get some stack traces to show where the hung process(es) are stuck?  That would help Ralph pin down where things aren't working down in ORTE.
<br>
<p>on node0 :
<br>
<p>&nbsp;&nbsp;\_ -bash
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\_ /.../local/ompi-trunk/bin/mpirun -np 2 -host node1,node2 --mca rtc_freq_priority 0 --mc
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\_ /usr/bin/ssh -x node1     PATH=/.../local/ompi-trunk/bin:$PATH ; export PATH ; LD_LIBRAR
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\_ /usr/bin/ssh -x node2     PATH=/.../local/ompi-trunk/bin:$PATH ; export PATH ; LD_LIBRAR
<br>
<p><p>pstack (mpirun) :
<br>
$ pstack 10913
<br>
Thread 2 (Thread 0x7f0ecad35700 (LWP 10914)):
<br>
#0  0x0000003ba66e15e3 in select () from /lib64/libc.so.6
<br>
#1  0x00007f0ecad4391e in listen_thread () from /.../local/ompi-trunk/lib/openmpi/mca_oob_tcp.so
<br>
#2  0x0000003ba72079d1 in start_thread () from /lib64/libpthread.so.0
<br>
#3  0x0000003ba66e8b6d in clone () from /lib64/libc.so.6
<br>
Thread 1 (Thread 0x7f0ecc601700 (LWP 10913)):
<br>
#0  0x0000003ba66df343 in poll () from /lib64/libc.so.6
<br>
#1  0x00007f0ecc6b1a05 in poll_dispatch () from /.../local/ompi-trunk/lib/libopen-pal.so.0
<br>
#2  0x00007f0ecc6a641c in opal_libevent2021_event_base_loop () from /.../local/ompi-trunk/lib/libopen-pal.so.0
<br>
#3  0x00000000004056a1 in orterun ()
<br>
#4  0x00000000004039f4 in main ()
<br>
<p><p>on node 1 :
<br>
<p>&nbsp;sshd: gouaillardet_at_notty
<br>
&nbsp;&nbsp;\_ bash -c     PATH=/.../local/ompi-trunk/bin:$PATH ; export PATH ; LD_LIBRARY_PATH=/...
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\_ /.../local/ompi-trunk/bin/orted -mca ess env -mca orte_ess_jobid 3459448832 -mca orte_ess_vpid
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\_ [abort] &lt;defunct&gt;
<br>
<p>$ pstack (orted)
<br>
#0  0x00007fe0ba6a0566 in vfprintf () from /lib64/libc.so.6
<br>
#1  0x00007fe0ba6c9a52 in vsnprintf () from /lib64/libc.so.6
<br>
#2  0x00007fe0ba6a9523 in snprintf () from /lib64/libc.so.6
<br>
#3  0x00007fe0bbc019b6 in orte_util_print_jobids () from /.../local/ompi-trunk/lib/libopen-rte.so.0
<br>
#4  0x00007fe0bbc01791 in orte_util_print_name_args () from /.../local/ompi-trunk/lib/libopen-rte.so.0
<br>
#5  0x00007fe0b8e16a8b in mca_oob_tcp_component_hop_unknown () from /.../local/ompi-trunk/lib/openmpi/mca_oob_tcp.so
<br>
#6  0x00007fe0bb94ab7a in event_process_active_single_queue () from /.../local/ompi-trunk/lib/libopen-pal.so.0
<br>
#7  0x00007fe0bb94adf2 in event_process_active () from /.../local/ompi-trunk/lib/libopen-pal.so.0
<br>
#8  0x00007fe0bb94b470 in opal_libevent2021_event_base_loop () from /.../local/ompi-trunk/lib/libopen-pal.so.0
<br>
#9  0x00007fe0bbc1fa7b in orte_daemon () from /.../local/ompi-trunk/lib/libopen-rte.so.0
<br>
#10 0x000000000040093a in main ()
<br>
<p><p>on node 2 :
<br>
<p>&nbsp;sshd: gouaillardet_at_notty
<br>
&nbsp;&nbsp;\_ bash -c     PATH=/.../local/ompi-trunk/bin:$PATH ; export PATH ; LD_LIBRARY_PATH=/...
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\_ /.../local/ompi-trunk/bin/orted -mca ess env -mca orte_ess_jobid 3459448832 -mca orte_ess_vpid
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\_ [abort] &lt;defunct&gt;
<br>
<p>$ pstack (orted)
<br>
#0  0x00007fe8fc435e39 in strchrnul () from /lib64/libc.so.6
<br>
#1  0x00007fe8fc3ef8f5 in vfprintf () from /lib64/libc.so.6
<br>
#2  0x00007fe8fc41aa52 in vsnprintf () from /lib64/libc.so.6
<br>
#3  0x00007fe8fc3fa523 in snprintf () from /lib64/libc.so.6
<br>
#4  0x00007fe8fd9529b6 in orte_util_print_jobids () from /.../local/ompi-trunk/lib/libopen-rte.so.0
<br>
#5  0x00007fe8fd952791 in orte_util_print_name_args () from /.../local/ompi-trunk/lib/libopen-rte.so.0
<br>
#6  0x00007fe8fab6c1b5 in resend () from /.../local/ompi-trunk/lib/openmpi/mca_oob_tcp.so
<br>
#7  0x00007fe8fab67ce3 in mca_oob_tcp_component_hop_unknown () from /.../local/ompi-trunk/lib/openmpi/mca_oob_tcp.so
<br>
#8  0x00007fe8fd69bb7a in event_process_active_single_queue () from /.../local/ompi-trunk/lib/libopen-pal.so.0
<br>
#9  0x00007fe8fd69bdf2 in event_process_active () from /.../local/ompi-trunk/lib/libopen-pal.so.0
<br>
#10 0x00007fe8fd69c470 in opal_libevent2021_event_base_loop () from /.../local/ompi-trunk/lib/libopen-pal.so.0
<br>
#11 0x00007fe8fd970a7b in orte_daemon () from /...t/local/ompi-trunk/lib/libopen-rte.so.0
<br>
#12 0x000000000040093a in main ()
<br>
<p><p>orted processes loop forever in event_process_active_single_queue
<br>
mca_oob_tcp_component_hop_unknown gets called again and again
<br>
mca_oob_tcp_component_hop_unknown (fd=-1, args=4, cbdata=0x99dc50) at ../../../../../../src/ompi-trunk/orte/mca/oob/tcp/oob_tcp_component.c:1369
<br>
<p><span class="quotelev1">&gt; in an other thread, Jeff mentionned that the usnic btl is doing stuff even if there is no usnic hardware (this will be fixed shortly).
</span><br>
<span class="quotelev1">&gt; Do you still see intermittent hang without listing usnic as a btl ?
</span><br>
<p>Yeah, there's a definite race in the usnic BTL ATM.  If you care, here's what's happening:
<br>
<p>thanks for the insights :-)
<br>
<p>Cheers,
<br>
<p>Gilles
<br>
_______________________________________________
<br>
devel mailing list
<br>
devel_at_[hidden]&lt;mailto:devel_at_[hidden]&gt;
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
<br>
Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/06/14943.php">http://www.open-mpi.org/community/lists/devel/2014/06/14943.php</a>
<br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-14946/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14947.php">Gilles Gouaillardet: "Re: [OMPI devel] trunk failure"</a>
<li><strong>Previous message:</strong> <a href="14945.php">Mike Dubman: "Re: [OMPI devel] trunk failure"</a>
<li><strong>In reply to:</strong> <a href="14943.php">Gilles Gouaillardet: "Re: [OMPI devel] Intermittent hangs when exiting with error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14953.php">Gilles Gouaillardet: "Re: [OMPI devel] Intermittent hangs when exiting with error"</a>
<li><strong>Reply:</strong> <a href="14953.php">Gilles Gouaillardet: "Re: [OMPI devel] Intermittent hangs when exiting with error"</a>
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
