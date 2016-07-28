<?
$subject_val = "[OMPI devel] Fwd: [OMPI users] missing link option for openmpi-1.8.2rc2 on Linux";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Jul 25 11:59:41 2014" -->
<!-- isoreceived="20140725155941" -->
<!-- sent="Fri, 25 Jul 2014 15:59:40 +0000" -->
<!-- isosent="20140725155940" -->
<!-- name="Jeff Squyres (jsquyres)" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="[OMPI devel] Fwd: [OMPI users] missing link option for openmpi-1.8.2rc2 on Linux" -->
<!-- id="43BF8B75-9E2F-4728-85B7-6E3C9ADA2787_at_cisco.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="201407250644.s6P6imrr029252_at_tyr.informatik.hs-fulda.de" -->
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
<strong>Subject:</strong> [OMPI devel] Fwd: [OMPI users] missing link option for openmpi-1.8.2rc2 on Linux<br>
<strong>From:</strong> Jeff Squyres (jsquyres) (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-07-25 11:59:40
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="15268.php">Ralph Castain: "Re: [OMPI devel] Fwd: [OMPI users] missing link option for openmpi-1.8.2rc2 on Linux"</a>
<li><strong>Previous message:</strong> <a href="15266.php">Ralph Castain: "Re: [OMPI devel] Trunk broken for --with-devel-headers?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="15268.php">Ralph Castain: "Re: [OMPI devel] Fwd: [OMPI users] missing link option for openmpi-1.8.2rc2 on Linux"</a>
<li><strong>Reply:</strong> <a href="15268.php">Ralph Castain: "Re: [OMPI devel] Fwd: [OMPI users] missing link option for openmpi-1.8.2rc2 on Linux"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
OMPI developers --
<br>
<p>Is &quot;-z noexecstack&quot; a linker option we should test for in configure, and use it if it works?
<br>
<p>Are there any side effects that could cause problems?
<br>
<p><p>Begin forwarded message:
<br>
<p><span class="quotelev1">&gt; From: Siegmar Gross &lt;Siegmar.Gross_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Subject: [OMPI users] missing link option for openmpi-1.8.2rc2 on Linux
</span><br>
<span class="quotelev1">&gt; Date: July 25, 2014 at 2:44:48 AM EDT
</span><br>
<span class="quotelev1">&gt; To: &lt;users_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Reply-To: Siegmar Gross &lt;Siegmar.Gross_at_[hidden]&gt;, Open MPI Users &lt;users_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Hi,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I installed openmpi-1.8.2rc2 on &quot;openSUSE Linux 12.1 x86_64&quot;
</span><br>
<span class="quotelev1">&gt; with Sun C 5.12 and get the following warning if I run a small
</span><br>
<span class="quotelev1">&gt; Java program. I get no warning for my gcc-4.9.0 version of
</span><br>
<span class="quotelev1">&gt; openmpi-1.8.2rc2.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; linpc1 java 109 mpiexec -np 1 java InitFinalizeMain
</span><br>
<span class="quotelev1">&gt; Java HotSpot(TM) 64-Bit Server VM warning: You have loaded library
</span><br>
<span class="quotelev1">&gt;  /usr/local/openmpi-1.8.2_64_cc/lib64/libmpi_java.so.1.2.0 which
</span><br>
<span class="quotelev1">&gt;  might have disabled stack guard. The VM will try to fix the stack
</span><br>
<span class="quotelev1">&gt;  guard now.
</span><br>
<span class="quotelev1">&gt; It's highly recommended that you fix the library with
</span><br>
<span class="quotelev1">&gt;  'execstack -c &lt;libfile&gt;', or link it with '-z noexecstack'.
</span><br>
<span class="quotelev1">&gt; Hello!
</span><br>
<span class="quotelev1">&gt; linpc1 java 110 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I would be grateful if somebody can add the link option
</span><br>
<span class="quotelev1">&gt; '-z noexecstack' to omit the warning. Thank you very much for
</span><br>
<span class="quotelev1">&gt; your help in advance.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Kind regards
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Siegmar
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; users mailing list
</span><br>
<span class="quotelev1">&gt; users_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/users/2014/07/24871.php">http://www.open-mpi.org/community/lists/users/2014/07/24871.php</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="15268.php">Ralph Castain: "Re: [OMPI devel] Fwd: [OMPI users] missing link option for openmpi-1.8.2rc2 on Linux"</a>
<li><strong>Previous message:</strong> <a href="15266.php">Ralph Castain: "Re: [OMPI devel] Trunk broken for --with-devel-headers?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="15268.php">Ralph Castain: "Re: [OMPI devel] Fwd: [OMPI users] missing link option for openmpi-1.8.2rc2 on Linux"</a>
<li><strong>Reply:</strong> <a href="15268.php">Ralph Castain: "Re: [OMPI devel] Fwd: [OMPI users] missing link option for openmpi-1.8.2rc2 on Linux"</a>
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
