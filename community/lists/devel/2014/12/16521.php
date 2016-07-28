<?
$subject_val = "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Dec 11 21:59:28 2014" -->
<!-- isoreceived="20141212025928" -->
<!-- sent="Thu, 11 Dec 2014 18:59:25 -0800" -->
<!-- isosent="20141212025925" -->
<!-- name="Paul Hargrove" -->
<!-- email="phhargrove_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64" -->
<!-- id="CAAvDA14UUKB8Buyj+D7rSAMVfR_YZ7eYxuODSD7W_Bid3ZUkZA_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="DF7F86B1-F68C-41FC-A780-64ADD0CEDC9B_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64<br>
<strong>From:</strong> Paul Hargrove (<em>phhargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-12-11 21:59:25
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16522.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<li><strong>Previous message:</strong> <a href="16520.php">Paul Hargrove: "[OMPI devel] [1.8.4rc2] build broken by default on SGI UV"</a>
<li><strong>In reply to:</strong> <a href="16515.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16522.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<li><strong>Reply:</strong> <a href="16522.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Don't see an rc3 yet.
<br>
<p>My Solaris-10/SPARC runs fail slightly differently (see below).
<br>
It looks sufficiently similar that it MIGHT be the same root cause.
<br>
However, lacking an rc3 to test I figured it would be better to report this
<br>
than to ignore it.
<br>
<p>The problem is present with both V8+ and V9 ABIs, and with both Gnu and Sun
<br>
compilers.
<br>
<p>-Paul
<br>
<p>[niagara1:29881] *** Process received signal ***
<br>
[niagara1:29881] Signal: Segmentation Fault (11)
<br>
[niagara1:29881] Signal code: Address not mapped (1)
<br>
[niagara1:29881] Failing at address: 2
<br>
/sandbox/hargrove/OMPI/openmpi-1.8.4rc2-solaris10-sparcT2-gcc346-v8plus/INST/lib/libopen-pal.so.6.2.1:opal_bac
<br>
ktrace_print+0x24
<br>
/sandbox/hargrove/OMPI/openmpi-1.8.4rc2-solaris10-sparcT2-gcc346-v8plus/INST/lib/libopen-pal.so.6.2.1:0xaa160
<br>
/lib/libc.so.1:0xc5364
<br>
/lib/libc.so.1:0xb9e64
<br>
/lib/libc.so.1:strlen+0x14 [ Signal 11 (SEGV)]
<br>
/sandbox/hargrove/OMPI/openmpi-1.8.4rc2-solaris10-sparcT2-gcc346-v8plus/INST/lib/libopen-pal.so.6.2.1:opal_vas
<br>
printf+0x20
<br>
/sandbox/hargrove/OMPI/openmpi-1.8.4rc2-solaris10-sparcT2-gcc346-v8plus/INST/lib/libopen-pal.so.6.2.1:opal_asp
<br>
rintf+0x30
<br>
/sandbox/hargrove/OMPI/openmpi-1.8.4rc2-solaris10-sparcT2-gcc346-v8plus/INST/lib/libopen-pal.so.6.2.1:opal_hwl
<br>
oc_base_get_topo_signature+0x24c
<br>
/sandbox/hargrove/OMPI/openmpi-1.8.4rc2-solaris10-sparcT2-gcc346-v8plus/INST/lib/openmpi/mca_ess_hnp.so:0x2d90
<br>
/sandbox/hargrove/OMPI/openmpi-1.8.4rc2-solaris10-sparcT2-gcc346-v8plus/INST/lib/libopen-rte.so.7.0.5:orte_ini
<br>
t+0x2f8
<br>
/sandbox/hargrove/OMPI/openmpi-1.8.4rc2-solaris10-sparcT2-gcc346-v8plus/INST/bin/orterun:orterun+0xaa8
<br>
/sandbox/hargrove/OMPI/openmpi-1.8.4rc2-solaris10-sparcT2-gcc346-v8plus/INST/bin/orterun:main+0x14
<br>
/sandbox/hargrove/OMPI/openmpi-1.8.4rc2-solaris10-sparcT2-gcc346-v8plus/INST/bin/orterun:_start+0x5c
<br>
[niagara1:29881] *** End of error message ***
<br>
Segmentation Fault - core dumped
<br>
<p>On Thu, Dec 11, 2014 at 3:29 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Ah crud - incomplete commit means we didn't send the topo string. Will
</span><br>
<span class="quotelev1">&gt; roll rc3 in a few minutes.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Thanks, Paul
</span><br>
<span class="quotelev1">&gt; Ralph
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Dec 11, 2014, at 3:08 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Testing the 1.8.4rc2 tarball on my x86-64 Solaris-11 systems I am getting
</span><br>
<span class="quotelev1">&gt; the following crash for both &quot;-m32&quot; and &quot;-m64&quot; builds:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; $ mpirun -mca btl sm,self,openib -np 2 -host pcp-j-19,pcp-j-20
</span><br>
<span class="quotelev1">&gt; examples/ring_c'
</span><br>
<span class="quotelev1">&gt; [pcp-j-19:18762] *** Process received signal ***
</span><br>
<span class="quotelev1">&gt; [pcp-j-19:18762] Signal: Segmentation Fault (11)
</span><br>
<span class="quotelev1">&gt; [pcp-j-19:18762] Signal code: Address not mapped (1)
</span><br>
<span class="quotelev1">&gt; [pcp-j-19:18762] Failing at address: 0
</span><br>
<span class="quotelev1">&gt; /shared/OMPI/openmpi-1.8.4rc2-solaris11-x64-ib-gcc452/INST/lib/libopen-pal.so.6.2.1'opal_backtrace_print+0x26
</span><br>
<span class="quotelev1">&gt; [0xfffffd7ffaf237ba]
</span><br>
<span class="quotelev1">&gt; /shared/OMPI/openmpi-1.8.4rc2-solaris11-x64-ib-gcc452/INST/lib/libopen-pal.so.6.2.1'show_stackframe+0x833
</span><br>
<span class="quotelev1">&gt; [0xfffffd7ffaf20ba1]
</span><br>
<span class="quotelev1">&gt; /lib/amd64/libc.so.1'__sighndlr+0x6 [0xfffffd7fff202cc6]
</span><br>
<span class="quotelev1">&gt; /lib/amd64/libc.so.1'call_user_handler+0x2aa [0xfffffd7fff1f648e]
</span><br>
<span class="quotelev1">&gt; /lib/amd64/libc.so.1'strcmp+0x1a [0xfffffd7fff170fda] [Signal 11 (SEGV)]
</span><br>
<span class="quotelev1">&gt; /shared/OMPI/openmpi-1.8.4rc2-solaris11-x64-ib-gcc452/INST/bin/orted'main+0x90
</span><br>
<span class="quotelev1">&gt; [0x4010b7]
</span><br>
<span class="quotelev1">&gt; /shared/OMPI/openmpi-1.8.4rc2-solaris11-x64-ib-gcc452/INST/bin/orted'_start+0x6c
</span><br>
<span class="quotelev1">&gt; [0x400f2c]
</span><br>
<span class="quotelev1">&gt; [pcp-j-19:18762] *** End of error message ***
</span><br>
<span class="quotelev1">&gt; bash: line 1: 18762 Segmentation Fault      (core dumped)
</span><br>
<span class="quotelev1">&gt; /shared/OMPI/openmpi-1.8.4rc2-solaris11-x64-ib-gcc452/INST/bin/orted -mca
</span><br>
<span class="quotelev1">&gt; ess &quot;env&quot; -mca orte_ess_jobid &quot;911343616&quot; -mca orte_ess_vpid 1 -mca
</span><br>
<span class="quotelev1">&gt; orte_ess_num_procs &quot;2&quot; -mca orte_hnp_uri &quot;911343616.0;tcp://172.16.0.120,
</span><br>
<span class="quotelev1">&gt; 172.18.0.120:50362&quot; --tree-spawn -mca btl &quot;sm,self,openib&quot; -mca plm &quot;rsh&quot;
</span><br>
<span class="quotelev1">&gt; -mca shmem_mmap_enable_nfs_warning &quot;0&quot;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Running gdb against a core generated by the 32-bit build gives line
</span><br>
<span class="quotelev1">&gt; numbers:
</span><br>
<span class="quotelev1">&gt; #0  0xfea1cb45 in strcmp () from /lib/libc.so.1
</span><br>
<span class="quotelev1">&gt; #1  0xfeef4900 in orte_daemon (argc=26, argv=0x80479b0)
</span><br>
<span class="quotelev1">&gt;     at
</span><br>
<span class="quotelev1">&gt; /shared/OMPI/openmpi-1.8.4rc2-solaris11-x86-ib-gcc452/openmpi-1.8.4rc2/orte/orted/orted_main.c:789
</span><br>
<span class="quotelev1">&gt; #2  0x08050fb1 in main (argc=26, argv=0x80479b0)
</span><br>
<span class="quotelev1">&gt;     at
</span><br>
<span class="quotelev1">&gt; /shared/OMPI/openmpi-1.8.4rc2-solaris11-x86-ib-gcc452/openmpi-1.8.4rc2/orte/tools/orted/orted.c:62
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev1">&gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev1">&gt;  _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2014/12/16514.php">http://www.open-mpi.org/community/lists/devel/2014/12/16514.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2014/12/16515.php">http://www.open-mpi.org/community/lists/devel/2014/12/16515.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><p><p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Computer Languages &amp; Systems Software (CLaSS) Group
Computer Science Department               Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-16521/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16522.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<li><strong>Previous message:</strong> <a href="16520.php">Paul Hargrove: "[OMPI devel] [1.8.4rc2] build broken by default on SGI UV"</a>
<li><strong>In reply to:</strong> <a href="16515.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16522.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
<li><strong>Reply:</strong> <a href="16522.php">Ralph Castain: "Re: [OMPI devel] [1.8.4rc2] orted SEGVs on Solaris-11/x86-64"</a>
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
