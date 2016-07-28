<?
$subject_val = "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Jul 16 06:47:25 2009" -->
<!-- isoreceived="20090716104725" -->
<!-- sent="Thu, 16 Jul 2009 04:47:09 -0600" -->
<!-- isosent="20090716104709" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support" -->
<!-- id="B1F57578-E754-4BED-98B8-E5C6C6FCEA90_at_open-mpi.org" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="32165657.621247718277895.JavaMail.csamuel_at_sys26" -->
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
<strong>Subject:</strong> Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-07-16 06:47:09
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="6447.php">Terry Dontje: "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support"</a>
<li><strong>Previous message:</strong> <a href="6445.php">Prasadcse Perera: "[OMPI devel] Question on MPI_Info"</a>
<li><strong>In reply to:</strong> <a href="6441.php">Chris Samuel: "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6447.php">Terry Dontje: "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support"</a>
<li><strong>Reply:</strong> <a href="6447.php">Terry Dontje: "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support"</a>
<li><strong>Reply:</strong> <a href="6459.php">Chris Samuel: "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Sounds like a problem in PLPA - I'll have to defer to them. Our  
<br>
primary PLPA person is on vacation this week, so you might not hear  
<br>
back from him until later next week when he gets through his inbox  
<br>
mountain.
<br>
<p>PLPA may have its own mailing list too - not really sure.
<br>
<p>On Jul 15, 2009, at 10:24 PM, Chris Samuel wrote:
<br>
<p><span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; ----- &quot;Ralph Castain&quot; &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Looking at your command line, did you remember to set -mca
</span><br>
<span class="quotelev2">&gt;&gt; mpi_paffinity_alone 1?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Ahh, no, sorry, still feeling my way with this..
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; If not, we won't set affinity on the processes.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Now it fails immediately with:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  Setting processor affinity failed
</span><br>
<span class="quotelev1">&gt;  --&gt; Returned &quot;Invalid argument&quot; (-11) instead of &quot;Success&quot; (0)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; wrapped in a bunch of OpenMPI messages explaining that it
</span><br>
<span class="quotelev1">&gt; failed on start.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; The strace looks much the same as before.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; [csamuel_at_tango047 CPI]$ fgrep affinity cpi-trace.txt
</span><br>
<span class="quotelev1">&gt; 10853 execve(&quot;/usr/local/openmpi/1.3.3-gcc/bin/mpiexec&quot;, [&quot;mpiexec&quot;,  
</span><br>
<span class="quotelev1">&gt; &quot;-mca&quot;, &quot;mpi_paffinity_alone&quot;, &quot;1&quot;, &quot;-npernode&quot;, &quot;4&quot;, &quot;/home/csamuel/ 
</span><br>
<span class="quotelev1">&gt; Sources/Tests/CPI/&quot;...], [/* 56 vars */]) = 0
</span><br>
<span class="quotelev1">&gt; 10853 sched_getaffinity(0, 128,  { 3c }) = 8
</span><br>
<span class="quotelev1">&gt; 10853 sched_setaffinity(0, 8,  { 0 })   = -1 EFAULT (Bad address)
</span><br>
<span class="quotelev1">&gt; 10854 sched_getaffinity(0, 128,  &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10854 &lt;... sched_getaffinity resumed&gt;  { 3c }) = 8
</span><br>
<span class="quotelev1">&gt; 10854 sched_setaffinity(0, 8,  { 0 } &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10854 &lt;... sched_setaffinity resumed&gt; ) = -1 EFAULT (Bad address)
</span><br>
<span class="quotelev1">&gt; 10857 sched_getaffinity(0, 128,  &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10857 &lt;... sched_getaffinity resumed&gt;  { 3c }) = 8
</span><br>
<span class="quotelev1">&gt; 10857 sched_setaffinity(0, 8,  { 0 } &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10857 &lt;... sched_setaffinity resumed&gt; ) = -1 EFAULT (Bad address)
</span><br>
<span class="quotelev1">&gt; 10856 sched_getaffinity(0, 128,  &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10856 &lt;... sched_getaffinity resumed&gt;  { 3c }) = 8
</span><br>
<span class="quotelev1">&gt; 10856 sched_setaffinity(0, 8,  { 0 } &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10856 &lt;... sched_setaffinity resumed&gt; ) = -1 EFAULT (Bad address)
</span><br>
<span class="quotelev1">&gt; 10855 sched_getaffinity(0, 128,  &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10855 &lt;... sched_getaffinity resumed&gt;  { 3c }) = 8
</span><br>
<span class="quotelev1">&gt; 10855 sched_setaffinity(0, 8,  { 0 } &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10855 &lt;... sched_setaffinity resumed&gt; ) = -1 EFAULT (Bad address)
</span><br>
<span class="quotelev1">&gt; 10857 sched_setaffinity(10857, 8,  { 8 } &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10857 &lt;... sched_setaffinity resumed&gt; ) = 0
</span><br>
<span class="quotelev1">&gt; 10856 sched_setaffinity(10856, 8,  { 4 } &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10856 &lt;... sched_setaffinity resumed&gt; ) = 0
</span><br>
<span class="quotelev1">&gt; 10854 sched_setaffinity(10854, 8,  { 1 } &lt;unfinished ...&gt;
</span><br>
<span class="quotelev1">&gt; 10854 &lt;... sched_setaffinity resumed&gt; ) = -1 EINVAL (Invalid argument)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; cheers,
</span><br>
<span class="quotelev1">&gt; Chris
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Christopher Samuel - (03) 9925 4751 - Systems Manager
</span><br>
<span class="quotelev1">&gt; The Victorian Partnership for Advanced Computing
</span><br>
<span class="quotelev1">&gt; P.O. Box 201, Carlton South, VIC 3053, Australia
</span><br>
<span class="quotelev1">&gt; VPAC is a not-for-profit Registered Research Agency
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
<li><strong>Next message:</strong> <a href="6447.php">Terry Dontje: "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support"</a>
<li><strong>Previous message:</strong> <a href="6445.php">Prasadcse Perera: "[OMPI devel] Question on MPI_Info"</a>
<li><strong>In reply to:</strong> <a href="6441.php">Chris Samuel: "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6447.php">Terry Dontje: "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support"</a>
<li><strong>Reply:</strong> <a href="6447.php">Terry Dontje: "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support"</a>
<li><strong>Reply:</strong> <a href="6459.php">Chris Samuel: "Re: [OMPI devel] OpenMPI, PLPA and Linux cpuset/cgroup support"</a>
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
