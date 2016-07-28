<?
$subject_val = "Re: [OMPI devel] alps ras patch for SLURM";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Jul  9 08:46:39 2010" -->
<!-- isoreceived="20100709124639" -->
<!-- sent="Fri, 9 Jul 2010 14:46:34 +0200" -->
<!-- isosent="20100709124634" -->
<!-- name="Jerome Soumagne" -->
<!-- email="soumagne_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] alps ras patch for SLURM" -->
<!-- id="4C371A2A.6090408_at_cscs.ch" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="4728DD74-13C8-437D-88B6-2D62CD5DF563_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] alps ras patch for SLURM<br>
<strong>From:</strong> Jerome Soumagne (<em>soumagne_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-07-09 08:46:34
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8155.php">Ralph Castain: "Re: [OMPI devel] alps ras patch for SLURM"</a>
<li><strong>Previous message:</strong> <a href="8153.php">Ralph Castain: "Re: [OMPI devel] alps ras patch for SLURM"</a>
<li><strong>In reply to:</strong> <a href="8153.php">Ralph Castain: "Re: [OMPI devel] alps ras patch for SLURM"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8155.php">Ralph Castain: "Re: [OMPI devel] alps ras patch for SLURM"</a>
<li><strong>Reply:</strong> <a href="8155.php">Ralph Castain: "Re: [OMPI devel] alps ras patch for SLURM"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Well we actually use a patched version of SLURM, 2.2.0-pre8. It is 
<br>
planned to submit the modifications made internally at CSCS for the next 
<br>
SLURM release in November. We implement ALPS support based on the basic 
<br>
architecture of SLURM.
<br>
SLURM is only used to do the ALPS ressource allocation. We then use 
<br>
mpirun based on the portals and on the alps libaries.
<br>
We don't use mca parameters to direct selection and the alps RAS is 
<br>
automatically well selected.
<br>
<p>On 07/09/2010 01:59 PM, Ralph Castain wrote:
<br>
<span class="quotelev1">&gt; Forgive my confusion, but could you please clarify something? You are 
</span><br>
<span class="quotelev1">&gt; using ALPS as the resource manager doing the allocation, and then 
</span><br>
<span class="quotelev1">&gt; using SLURM as the launcher (instead of ALPS)?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; That's a combination we've never seen or heard about. I suspect our 
</span><br>
<span class="quotelev1">&gt; module selection logic would be confused by such a combination - are 
</span><br>
<span class="quotelev1">&gt; you using mca params to direct selection?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Jul 9, 2010, at 4:19 AM, Jerome Soumagne wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Hi,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; We've recently installed OpenMPI on one of our Cray XT5 machines, 
</span><br>
<span class="quotelev2">&gt;&gt; here at CSCS. This machine uses SLURM for launching jobs.
</span><br>
<span class="quotelev2">&gt;&gt; Doing an salloc defines this environment variable:
</span><br>
<span class="quotelev2">&gt;&gt;               BASIL_RESERVATION_ID
</span><br>
<span class="quotelev2">&gt;&gt;               The reservation ID on Cray systems running ALPS/BASIL only.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Since the alps ras module tries to find a variable called 
</span><br>
<span class="quotelev2">&gt;&gt; OMPI_ALPS_RESID which is set using a script, we thought that for 
</span><br>
<span class="quotelev2">&gt;&gt; SLURM systems it would be a good idea to directly integrate this 
</span><br>
<span class="quotelev2">&gt;&gt; BASIL_RESERVATION_ID variable in the code, rather than using a 
</span><br>
<span class="quotelev2">&gt;&gt; script. The small patch is attached.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Regards,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Jerome
</span><br>
<span class="quotelev2">&gt;&gt; -- 
</span><br>
<span class="quotelev2">&gt;&gt; J&#233;r&#244;me Soumagne
</span><br>
<span class="quotelev2">&gt;&gt; Scientific Computing Research Group
</span><br>
<span class="quotelev2">&gt;&gt; CSCS, Swiss National Supercomputing Centre
</span><br>
<span class="quotelev2">&gt;&gt; Galleria 2, Via Cantonale  | Tel: +41 (0)91 610 8258
</span><br>
<span class="quotelev2">&gt;&gt; CH-6928 Manno, Switzerland | Fax: +41 (0)91 610 8282
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;      
</span><br>
<span class="quotelev2">&gt;&gt; &lt;patch_slurm_alps.txt&gt;_______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
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
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p><pre>
-- 
J&#233;r&#244;me Soumagne
Scientific Computing Research Group
CSCS, Swiss National Supercomputing Centre
Galleria 2, Via Cantonale  | Tel: +41 (0)91 610 8258
CH-6928 Manno, Switzerland | Fax: +41 (0)91 610 8282
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-8154/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8155.php">Ralph Castain: "Re: [OMPI devel] alps ras patch for SLURM"</a>
<li><strong>Previous message:</strong> <a href="8153.php">Ralph Castain: "Re: [OMPI devel] alps ras patch for SLURM"</a>
<li><strong>In reply to:</strong> <a href="8153.php">Ralph Castain: "Re: [OMPI devel] alps ras patch for SLURM"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8155.php">Ralph Castain: "Re: [OMPI devel] alps ras patch for SLURM"</a>
<li><strong>Reply:</strong> <a href="8155.php">Ralph Castain: "Re: [OMPI devel] alps ras patch for SLURM"</a>
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
