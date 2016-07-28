<?
$subject_val = "[OMPI devel] orte_barrier: Assertion `0 == item-&gt;opal_list_item_refcount' failed.";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Jan  9 11:28:03 2014" -->
<!-- isoreceived="20140109162803" -->
<!-- sent="Thu, 9 Jan 2014 17:28:01 +0100" -->
<!-- isosent="20140109162801" -->
<!-- name="Adrian Reber" -->
<!-- email="adrian_at_[hidden]" -->
<!-- subject="[OMPI devel] orte_barrier: Assertion `0 == item-&amp;gt;opal_list_item_refcount' failed." -->
<!-- id="20140109162801.GD20741_at_lisas.de" -->
<!-- charset="us-ascii" -->
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
<strong>Subject:</strong> [OMPI devel] orte_barrier: Assertion `0 == item-&gt;opal_list_item_refcount' failed.<br>
<strong>From:</strong> Adrian Reber (<em>adrian_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-01-09 11:28:01
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="13629.php">Ralph Castain: "Re: [OMPI devel] 1.7.4rc2r30148 run failure NetBSD6-x86"</a>
<li><strong>Previous message:</strong> <a href="13627.php">Joshua Ladd: "Re: [OMPI devel] hcoll destruction via MPI attribute"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="13644.php">Adrian Reber: "Re: [OMPI devel] orte_barrier: Assertion `0 == item-&gt;opal_list_item_refcount' failed."</a>
<li><strong>Reply:</strong> <a href="13644.php">Adrian Reber: "Re: [OMPI devel] orte_barrier: Assertion `0 == item-&gt;opal_list_item_refcount' failed."</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Continuing with the CR code I now get a crash which can be easily reproduced
<br>
using orte/test/system/orte_barrier.c
<br>
<p>I get:
<br>
<p>orte_barrier: ../../../../../opal/class/opal_list.h:547: _opal_list_append: Assertion `0 == item-&gt;opal_list_item_refcount' failed.
<br>
[dcbz:05085] *** Process received signal ***
<br>
[dcbz:05085] Signal: Aborted (6)
<br>
[dcbz:05085] Signal code:  (-6)
<br>
[dcbz:05085] [ 0] /lib64/libpthread.so.0(+0xf750)[0x7f95bca0b750]
<br>
[dcbz:05085] [ 1] /lib64/libc.so.6(gsignal+0x39)[0x7f95bc672c59]
<br>
[dcbz:05085] [ 2] /lib64/libc.so.6(abort+0x148)[0x7f95bc674368]
<br>
[dcbz:05085] [ 3] /lib64/libc.so.6(+0x2ebb6)[0x7f95bc66bbb6]
<br>
[dcbz:05085] [ 4] /lib64/libc.so.6(+0x2ec62)[0x7f95bc66bc62]
<br>
[dcbz:05085] [ 5] /home/adrian/devel/openmpi-trunk/lib/libopen-rte.so.0(+0x86975)[0x7f95bcfbd975]
<br>
[dcbz:05085] [ 6] /home/adrian/devel/openmpi-trunk/lib/libopen-rte.so.0(+0x86d9a)[0x7f95bcfbdd9a]
<br>
[dcbz:05085] [ 7] /home/adrian/devel/openmpi-trunk/lib/libopen-pal.so.0(+0x8c831)[0x7f95bcca5831]
<br>
[dcbz:05085] [ 8] /home/adrian/devel/openmpi-trunk/lib/libopen-pal.so.0(+0x8caa3)[0x7f95bcca5aa3]
<br>
[dcbz:05085] [ 9] /home/adrian/devel/openmpi-trunk/lib/libopen-pal.so.0(opal_libevent2021_event_base_loop+0x2c1)[0x7f95bcca611f]
<br>
[dcbz:05085] [10] /home/adrian/devel/openmpi-trunk/lib/libopen-rte.so.0(+0x2233b)[0x7f95bcf5933b]
<br>
[dcbz:05085] [11] /lib64/libpthread.so.0(+0x7f33)[0x7f95bca03f33]
<br>
[dcbz:05085] [12] /lib64/libc.so.6(clone+0x6d)[0x7f95bc731ead]
<br>
[dcbz:05085] *** End of error message ***
<br>
--------------------------------------------------------------------------
<br>
orterun noticed that process rank 0 with PID 5085 on node dcbz exited on signal 6 (Aborted).
<br>
--------------------------------------------------------------------------
<br>
<p>and in gdb
<br>
<p>[New LWP 5086]
<br>
[New LWP 5085]
<br>
[Thread debugging using libthread_db enabled]
<br>
Using host libthread_db library &quot;/lib64/libthread_db.so.1&quot;.
<br>
Core was generated by `system/orte_barrier'.
<br>
Program terminated with signal SIGABRT, Aborted.
<br>
#0  0x00007f95bc672c59 in __GI_raise (sig=sig_at_entry=6) at ../nptl/sysdeps/unix/sysv/linux/raise.c:56
<br>
56	  return INLINE_SYSCALL (tgkill, 3, pid, selftid, sig);
<br>
(gdb) bt
<br>
#0  0x00007f95bc672c59 in __GI_raise (sig=sig_at_entry=6) at ../nptl/sysdeps/unix/sysv/linux/raise.c:56
<br>
#1  0x00007f95bc6744a8 in __GI_abort () at abort.c:118
<br>
#2  0x00007f95bc66bbb6 in __assert_fail_base (fmt=0x7f95bc7b8ea8 &quot;%s%s%s:%u: %s%sAssertion `%s' failed.\n%n&quot;, 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;assertion=assertion_at_entry=0x7f95bd06d6c0 &quot;0 == item-&gt;opal_list_item_refcount&quot;, 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;file=file_at_entry=0x7f95bd06d600 &quot;../../../../../opal/class/opal_list.h&quot;, line=line_at_entry=547, 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;function=function_at_entry=0x7f95bd06d9d0 &lt;__PRETTY_FUNCTION__.4605&gt; &quot;_opal_list_append&quot;) at assert.c:92
<br>
#3  0x00007f95bc66bc62 in __GI___assert_fail (assertion=0x7f95bd06d6c0 &quot;0 == item-&gt;opal_list_item_refcount&quot;, 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;file=0x7f95bd06d600 &quot;../../../../../opal/class/opal_list.h&quot;, line=547, 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;function=0x7f95bd06d9d0 &lt;__PRETTY_FUNCTION__.4605&gt; &quot;_opal_list_append&quot;) at assert.c:101
<br>
#4  0x00007f95bcfbd975 in _opal_list_append (list=0x7f95bd2b9408 &lt;orte_grpcomm_base+8&gt;, item=0x1f35be0, 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;FILE_NAME=0x7f95bd06d718 &quot;../../../../../orte/mca/grpcomm/bad/grpcomm_bad_module.c&quot;, LINENO=163)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;at ../../../../../opal/class/opal_list.h:547
<br>
#5  0x00007f95bcfbdd9a in process_barrier (fd=-1, args=4, cbdata=0x1f35ed0) at ../../../../../orte/mca/grpcomm/bad/grpcomm_bad_module.c:163
<br>
#6  0x00007f95bcca5831 in event_process_active_single_queue (base=0x1ef63a0, activeq=0x1ef6360)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;at ../../../../../../opal/mca/event/libevent2021/libevent/event.c:1367
<br>
#7  0x00007f95bcca5aa3 in event_process_active (base=0x1ef63a0) at ../../../../../../opal/mca/event/libevent2021/libevent/event.c:1437
<br>
#8  0x00007f95bcca611f in opal_libevent2021_event_base_loop (base=0x1ef63a0, flags=1)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;at ../../../../../../opal/mca/event/libevent2021/libevent/event.c:1645
<br>
#9  0x00007f95bcf5933b in orte_progress_thread_engine (obj=0x7f95bd2b9160 &lt;orte_progress_thread&gt;) at ../../orte/runtime/orte_init.c:180
<br>
#10 0x00007f95bca03f33 in start_thread (arg=0x7f95bbb0d700) at pthread_create.c:309
<br>
#11 0x00007f95bc731ead in clone () at ../sysdeps/unix/sysv/linux/x86_64/clone.S:111
<br>
(gdb) 
<br>
<p>As far as I understand it seems to call opal_list_append() twice in
<br>
orte/mca/grpcomm/bad/grpcomm_bad_module.c:163
<br>
<p>opal_list_append(&amp;orte_grpcomm_base.active_colls, &amp;coll-&gt;super);
<br>
<p>I have no idea how to fix this.
<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adrian
<br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="13629.php">Ralph Castain: "Re: [OMPI devel] 1.7.4rc2r30148 run failure NetBSD6-x86"</a>
<li><strong>Previous message:</strong> <a href="13627.php">Joshua Ladd: "Re: [OMPI devel] hcoll destruction via MPI attribute"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="13644.php">Adrian Reber: "Re: [OMPI devel] orte_barrier: Assertion `0 == item-&gt;opal_list_item_refcount' failed."</a>
<li><strong>Reply:</strong> <a href="13644.php">Adrian Reber: "Re: [OMPI devel] orte_barrier: Assertion `0 == item-&gt;opal_list_item_refcount' failed."</a>
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
