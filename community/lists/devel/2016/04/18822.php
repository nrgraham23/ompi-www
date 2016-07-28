<?
$subject_val = "Re: [OMPI devel] Process affinity detection";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Apr 26 17:56:10 2016" -->
<!-- isoreceived="20160426215610" -->
<!-- sent="Tue, 26 Apr 2016 14:56:07 -0700" -->
<!-- isosent="20160426215607" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Process affinity detection" -->
<!-- id="981B14AE-A7DE-41EF-958E-40FB4BD61276_at_open-mpi.org" -->
<!-- charset="utf-8" -->
<!-- inreplyto="571FDD57.9070408_at_nvidia.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Process affinity detection<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2016-04-26 17:56:07
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18823.php">Sylvain Jeaugey: "Re: [OMPI devel] Process affinity detection"</a>
<li><strong>Previous message:</strong> <a href="18821.php">Sylvain Jeaugey: "[OMPI devel] Process affinity detection"</a>
<li><strong>In reply to:</strong> <a href="18821.php">Sylvain Jeaugey: "[OMPI devel] Process affinity detection"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="18823.php">Sylvain Jeaugey: "Re: [OMPI devel] Process affinity detection"</a>
<li><strong>Reply:</strong> <a href="18823.php">Sylvain Jeaugey: "Re: [OMPI devel] Process affinity detection"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Hmmm&#226;&#128;&#166;you mean for procs on the same node? I&#226;&#128;&#153;m not sure how you can do it without introducing another data exchange, and that would require the app to execute it since otherwise we have no idea when they set the affinity.
<br>
<p>If we assume they set the affinity prior to calling MPI_Init, then we could do it - but at the cost of forcing a modex. You can only detect your own affinity, so to get the relative placement, you have to do an exchange if we can&#226;&#128;&#153;t pass it to you. Perhaps we could offer it as an option?
<br>
<p><p><span class="quotelev1">&gt; On Apr 26, 2016, at 2:27 PM, Sylvain Jeaugey &lt;sjeaugey_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Within the BTL code (and surely elsewhere), we can use those convenient OPAL_PROC_ON_LOCAL_{NODE,SOCKET, ...} macros to figure out where another endpoint is located compared to us.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; The problem is that it only works when ORTE defines it. The NODE works almost always since ORTE is always doing it. But for the NUMA, SOCKET, or CORE to work, we need to use Open MPI binding/mapping capabilities. If the process affinity was set with something else (custom scripts using taskset, cpusets, ...), it doesn't work.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; How hard do you think it would it be to detect the affinity and set those flags using hwloc to figure out if we're on the same {SOCKET, CORE, ...} ? Where would it be simpler to do this ?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Thanks.
</span><br>
<span class="quotelev1">&gt; Sylvain
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -----------------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; This email message is for the sole use of the intended recipient(s) and may contain
</span><br>
<span class="quotelev1">&gt; confidential information.  Any unauthorized review, use, disclosure or distribution
</span><br>
<span class="quotelev1">&gt; is prohibited.  If you are not the intended recipient, please contact the sender by
</span><br>
<span class="quotelev1">&gt; reply email and destroy all copies of the original message.
</span><br>
<span class="quotelev1">&gt; -----------------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2016/04/18821.php">http://www.open-mpi.org/community/lists/devel/2016/04/18821.php</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18823.php">Sylvain Jeaugey: "Re: [OMPI devel] Process affinity detection"</a>
<li><strong>Previous message:</strong> <a href="18821.php">Sylvain Jeaugey: "[OMPI devel] Process affinity detection"</a>
<li><strong>In reply to:</strong> <a href="18821.php">Sylvain Jeaugey: "[OMPI devel] Process affinity detection"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="18823.php">Sylvain Jeaugey: "Re: [OMPI devel] Process affinity detection"</a>
<li><strong>Reply:</strong> <a href="18823.php">Sylvain Jeaugey: "Re: [OMPI devel] Process affinity detection"</a>
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
