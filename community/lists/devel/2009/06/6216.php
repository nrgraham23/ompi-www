<?
$subject_val = "Re: [OMPI devel] Hang in collectives involving shared memory";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Jun 10 13:52:08 2009" -->
<!-- isoreceived="20090610175208" -->
<!-- sent="Wed, 10 Jun 2009 11:52:00 -0600" -->
<!-- isosent="20090610175200" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Hang in collectives involving shared memory" -->
<!-- id="71d2d8cc0906101052h4a2c875bt5f0c486694626959_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="alpine.DEB.2.00.0906101803510.4598_at_jeaugeys.frec.bull.fr" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Hang in collectives involving shared memory<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-06-10 13:52:00
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="6217.php">Ashley Pittman: "[OMPI devel] padb and orte"</a>
<li><strong>Previous message:</strong> <a href="6215.php">Ralph Castain: "Re: [OMPI devel] Hang in collectives involving shared memory"</a>
<li><strong>In reply to:</strong> <a href="6213.php">Sylvain Jeaugey: "Re: [OMPI devel] Hang in collectives involving shared memory"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6226.php">Sylvain Jeaugey: "Re: [OMPI devel] Hang in collectives involving shared memory"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Much appreciated!
<br>
<p>Per some of my other comments on this thread and on the referenced ticket,
<br>
can you tell me what kernel you have on that machine? I assume you have NUMA
<br>
support enabled, given that chipset?
<br>
<p>Thanks!
<br>
Ralph
<br>
<p>On Wed, Jun 10, 2009 at 10:29 AM, Sylvain Jeaugey
<br>
&lt;sylvain.jeaugey_at_[hidden]&gt;wrote:
<br>
<p><span class="quotelev1">&gt; Hum, very glad that padb works with Open MPI, I couldn't live without it.
</span><br>
<span class="quotelev1">&gt; In my opinion, the best debug tool for parallel applications, and more
</span><br>
<span class="quotelev1">&gt; importantly, the only one that scales.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; About the issue, I couldn't reproduce it on my platform (tried 2 nodes with
</span><br>
<span class="quotelev1">&gt; 2 to 8 processes each, nodes are twin 2.93 GHz Nehalem, IB is Mellanox QDR).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; So my feeling about that is that is may be very hardware related.
</span><br>
<span class="quotelev1">&gt; Especially if you use the hierarch component, some transactions will be done
</span><br>
<span class="quotelev1">&gt; through RDMA on one side and read directly through shared memory on the
</span><br>
<span class="quotelev1">&gt; other side, which can, depending on the hardware, produce very different
</span><br>
<span class="quotelev1">&gt; timings and bugs. Did you try with a different collective component (i.e.
</span><br>
<span class="quotelev1">&gt; not hierarch) ? Or with another interconnect ? [Yes, of course, if it is a
</span><br>
<span class="quotelev1">&gt; race condition, we might well avoid the bug because timings will be
</span><br>
<span class="quotelev1">&gt; different, but that's still information]
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Perhaps all what I'm saying makes no sense or you already thought about
</span><br>
<span class="quotelev1">&gt; this, anyway, if you want me to try different things, just let me know.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Sylvain
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Wed, 10 Jun 2009, Ralph Castain wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  Hi Ashley
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Thanks! I would definitely be interested and will look at the tool.
</span><br>
<span class="quotelev2">&gt;&gt; Meantime, I have filed a bunch of data on this in
</span><br>
<span class="quotelev2">&gt;&gt; ticket #1944, so perhaps you might take a glance at that and offer some
</span><br>
<span class="quotelev2">&gt;&gt; thoughts?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; <a href="https://svn.open-mpi.org/trac/ompi/ticket/1944">https://svn.open-mpi.org/trac/ompi/ticket/1944</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Will be back after I look at the tool.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Thanks again
</span><br>
<span class="quotelev2">&gt;&gt; Ralph
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Wed, Jun 10, 2009 at 8:51 AM, Ashley Pittman &lt;ashley_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;      Ralph,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;      If I may say this is exactly the type of problem the tool I have been
</span><br>
<span class="quotelev2">&gt;&gt;      working on recently aims to help with and I'd be happy to help you
</span><br>
<span class="quotelev2">&gt;&gt;      through it.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;      Firstly I'd say of the three collectives you mention, MPI_Allgather,
</span><br>
<span class="quotelev2">&gt;&gt;      MPI_Reduce and MPI_Bcast one exhibit a many-to-many, one a
</span><br>
<span class="quotelev2">&gt;&gt; many-to-one
</span><br>
<span class="quotelev2">&gt;&gt;      and the last a many-to-one communication pattern.  The scenario of a
</span><br>
<span class="quotelev2">&gt;&gt;      root process falling behind and getting swamped in comms is a
</span><br>
<span class="quotelev2">&gt;&gt; plausible
</span><br>
<span class="quotelev2">&gt;&gt;      one for MPI_Reduce only but doesn't hold water with the other two.
</span><br>
<span class="quotelev2">&gt;&gt;  You
</span><br>
<span class="quotelev2">&gt;&gt;      also don't mention if the loop is over a single collective or if you
</span><br>
<span class="quotelev2">&gt;&gt;      have loop calling a number of different collectives each iteration.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;      padb, the tool I've been working on has the ability to look at
</span><br>
<span class="quotelev2">&gt;&gt; parallel
</span><br>
<span class="quotelev2">&gt;&gt;      jobs and report on the state of collective comms and should help
</span><br>
<span class="quotelev2">&gt;&gt; narrow
</span><br>
<span class="quotelev2">&gt;&gt;      you down on erroneous processes and those simply blocked waiting for
</span><br>
<span class="quotelev2">&gt;&gt;      comms.  I'd recommend using it to look at maybe four or five
</span><br>
<span class="quotelev2">&gt;&gt; instances
</span><br>
<span class="quotelev2">&gt;&gt;      where the application has hung and look for any common features
</span><br>
<span class="quotelev2">&gt;&gt; between
</span><br>
<span class="quotelev2">&gt;&gt;      them.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;      Let me know if you are willing to try this route and I'll talk, the
</span><br>
<span class="quotelev2">&gt;&gt; code
</span><br>
<span class="quotelev2">&gt;&gt;      is downloadable from <a href="http://padb.pittman.org.uk">http://padb.pittman.org.uk</a> and if you want the
</span><br>
<span class="quotelev2">&gt;&gt; full
</span><br>
<span class="quotelev2">&gt;&gt;      collective functionality you'll need to patch openmp with the patch
</span><br>
<span class="quotelev2">&gt;&gt; from
</span><br>
<span class="quotelev2">&gt;&gt;      <a href="http://padb.pittman.org.uk/extensions.html">http://padb.pittman.org.uk/extensions.html</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;      Ashley,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;      --
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;      Ashley Pittman, Bath, UK.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;      Padb - A parallel job inspection tool for cluster computing
</span><br>
<span class="quotelev2">&gt;&gt;      <a href="http://padb.pittman.org.uk">http://padb.pittman.org.uk</a>
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
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-6216/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="6217.php">Ashley Pittman: "[OMPI devel] padb and orte"</a>
<li><strong>Previous message:</strong> <a href="6215.php">Ralph Castain: "Re: [OMPI devel] Hang in collectives involving shared memory"</a>
<li><strong>In reply to:</strong> <a href="6213.php">Sylvain Jeaugey: "Re: [OMPI devel] Hang in collectives involving shared memory"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6226.php">Sylvain Jeaugey: "Re: [OMPI devel] Hang in collectives involving shared memory"</a>
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
