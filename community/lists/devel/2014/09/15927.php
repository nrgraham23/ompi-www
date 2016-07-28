<?
$subject_val = "Re: [OMPI devel] Neighbor collectives with periodic Cartesian topologies of size one";
include("../../include/msg-header.inc");
?>
<!-- received="Sun Sep 28 06:37:11 2014" -->
<!-- isoreceived="20140928103711" -->
<!-- sent="Sun, 28 Sep 2014 13:36:51 +0300" -->
<!-- isosent="20140928103651" -->
<!-- name="Lisandro Dalcin" -->
<!-- email="dalcinl_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Neighbor collectives with periodic Cartesian topologies of size one" -->
<!-- id="CAEcYPwBiJFQKC6eKfvmRKXHU7QUNupsdUpYY10S6HAsLBSMp8Q_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="20140925175037.GB84131_at_pn1246003.lanl.gov" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Neighbor collectives with periodic Cartesian topologies of size one<br>
<strong>From:</strong> Lisandro Dalcin (<em>dalcinl_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-09-28 06:36:51
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="15928.php">George Bosilca: "Re: [OMPI devel] Different behaviour with MPI_IN_PLACE in MPI_Reduce_scatter() and MPI_Ireduce_scatter()"</a>
<li><strong>Previous message:</strong> <a href="15926.php">Lisandro Dalcin: "Re: [OMPI devel] Different behaviour with MPI_IN_PLACE in MPI_Reduce_scatter() and MPI_Ireduce_scatter()"</a>
<li><strong>In reply to:</strong> <a href="15915.php">Nathan Hjelm: "Re: [OMPI devel] Neighbor collectives with periodic Cartesian topologies of size one"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="15929.php">Gilles Gouaillardet: "Re: [OMPI devel] Neighbor collectives with periodic Cartesian topologies of size one"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
On 25 September 2014 20:50, Nathan Hjelm &lt;hjelmn_at_[hidden]&gt; wrote:
<br>
<span class="quotelev1">&gt; On Tue, Aug 26, 2014 at 07:03:24PM +0300, Lisandro Dalcin wrote:
</span><br>
<span class="quotelev2">&gt;&gt; I finally managed to track down some issues in mpi4py's test suite
</span><br>
<span class="quotelev2">&gt;&gt; using Open MPI 1.8+. The code below should be enough to reproduce the
</span><br>
<span class="quotelev2">&gt;&gt; problem. Run it under valgrind to make sense of my following
</span><br>
<span class="quotelev2">&gt;&gt; diagnostics.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; In this code I'm creating a 2D, periodic Cartesian topology out of
</span><br>
<span class="quotelev2">&gt;&gt; COMM_SELF. In this case, the process in COMM_SELF has 4 logical in/out
</span><br>
<span class="quotelev2">&gt;&gt; links to itself. So we have size=1 but indegree=outdegree=4. However,
</span><br>
<span class="quotelev2">&gt;&gt; in ompi/mca/coll/basic/coll_basic_module.c, &quot;size * 2&quot; request are
</span><br>
<span class="quotelev2">&gt;&gt; being allocated to manage communication:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     if (OMPI_COMM_IS_INTER(comm)) {
</span><br>
<span class="quotelev2">&gt;&gt;         size = ompi_comm_remote_size(comm);
</span><br>
<span class="quotelev2">&gt;&gt;     } else {
</span><br>
<span class="quotelev2">&gt;&gt;         size = ompi_comm_size(comm);
</span><br>
<span class="quotelev2">&gt;&gt;     }
</span><br>
<span class="quotelev2">&gt;&gt;     basic_module-&gt;mccb_num_reqs = size * 2;
</span><br>
<span class="quotelev2">&gt;&gt;     basic_module-&gt;mccb_reqs = (ompi_request_t**)
</span><br>
<span class="quotelev2">&gt;&gt;         malloc(sizeof(ompi_request_t *) * basic_module-&gt;mccb_num_reqs);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I guess you have to also special-case for topologies and allocate
</span><br>
<span class="quotelev2">&gt;&gt; indegree+outdegree requests (not sure about this number, just
</span><br>
<span class="quotelev2">&gt;&gt; guessing).
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I wish this was possible but the topology information is not available
</span><br>
<span class="quotelev1">&gt; at that point. We may be able to change that but I don't see the work
</span><br>
<span class="quotelev1">&gt; completing anytime soon. I committed an alternative fix as r32796 and
</span><br>
<span class="quotelev1">&gt; CMR'd it to 1.8.3. I can confirm that the attached reproducer no longer
</span><br>
<span class="quotelev1">&gt; produces a SEGV. Let me know if you run into any more issues.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p>Did your fix get in for 1.8.3? I'm still getting the segfault.
<br>
<p><p><p><pre>
-- 
Lisandro Dalcin
============
Research Scientist
Computer, Electrical and Mathematical Sciences &amp; Engineering (CEMSE)
Numerical Porous Media Center (NumPor)
King Abdullah University of Science and Technology (KAUST)
<a href="http://numpor.kaust.edu.sa/">http://numpor.kaust.edu.sa/</a>
4700 King Abdullah University of Science and Technology
al-Khawarizmi Bldg (Bldg 1), Office # 4332
Thuwal 23955-6900, Kingdom of Saudi Arabia
<a href="http://www.kaust.edu.sa">http://www.kaust.edu.sa</a>
Office Phone: +966 12 808-0459
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="15928.php">George Bosilca: "Re: [OMPI devel] Different behaviour with MPI_IN_PLACE in MPI_Reduce_scatter() and MPI_Ireduce_scatter()"</a>
<li><strong>Previous message:</strong> <a href="15926.php">Lisandro Dalcin: "Re: [OMPI devel] Different behaviour with MPI_IN_PLACE in MPI_Reduce_scatter() and MPI_Ireduce_scatter()"</a>
<li><strong>In reply to:</strong> <a href="15915.php">Nathan Hjelm: "Re: [OMPI devel] Neighbor collectives with periodic Cartesian topologies of size one"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="15929.php">Gilles Gouaillardet: "Re: [OMPI devel] Neighbor collectives with periodic Cartesian topologies of size one"</a>
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
