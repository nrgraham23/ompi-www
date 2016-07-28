<?
$subject_val = "Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Dec  1 17:23:21 2009" -->
<!-- isoreceived="20091201222321" -->
<!-- sent="Tue, 1 Dec 2009 15:23:13 -0700" -->
<!-- isosent="20091201222313" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm" -->
<!-- id="2BEF776B-206F-435B-8E1F-91B202B92000_at_open-mpi.org" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="19399162-EF2F-4A3A-A675-E62E0DEB58A0_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-12-01 17:23:13
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="7170.php">Jeff Squyres: "Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm"</a>
<li><strong>Previous message:</strong> <a href="7168.php">Jeff Squyres: "Re: [OMPI devel] MPI_Graph_create"</a>
<li><strong>In reply to:</strong> <a href="7163.php">Jeff Squyres: "Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="7170.php">Jeff Squyres: "Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm"</a>
<li><strong>Reply:</strong> <a href="7170.php">Jeff Squyres: "Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
The only issue with that is it implies there is a param that can be adjusted - and there isn't. So it can confuse a user - or even a developer, as it did here.
<br>
<p>I should think we wouldn't want MCA to automatically add any parameter. If the component doesn't register it, then it shouldn't exist. The MCA can just track a value without defining it as a visible param.
<br>
<p>True?
<br>
<p>On Dec 1, 2009, at 5:48 AM, Jeff Squyres wrote:
<br>
<p><span class="quotelev1">&gt; This is not a bug, it's a feature.  :-)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; The MCA base automatically adds a priority MCA parameter for every component.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Dec 1, 2009, at 7:40 AM, Ralph Castain wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; I'm afraid Sylvain is right, and we have a bug in ompi_info:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;              MCA routed: parameter &quot;routed_binomial_priority&quot; (current value: &lt;0&gt;, data source: default value)
</span><br>
<span class="quotelev2">&gt;&gt;              MCA routed: parameter &quot;routed_cm_priority&quot; (current value: &lt;0&gt;, data source: default value)
</span><br>
<span class="quotelev2">&gt;&gt;              MCA routed: parameter &quot;routed_direct_priority&quot; (current value: &lt;0&gt;, data source: default value)
</span><br>
<span class="quotelev2">&gt;&gt;              MCA routed: parameter &quot;routed_linear_priority&quot; (current value: &lt;0&gt;, data source: default value)
</span><br>
<span class="quotelev2">&gt;&gt;              MCA routed: parameter &quot;routed_radix_priority&quot; (current value: &lt;0&gt;, data source: default value)
</span><br>
<span class="quotelev2">&gt;&gt;              MCA routed: parameter &quot;routed_slave_priority&quot; (current value: &lt;0&gt;, data source: default value)
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Those params do not exist in the code base. I think we -assume- that every component will have an MCA param for setting priority, but most of the ORTE ones do not.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; We'll need to review ompi_info and fix this.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Nov 30, 2009, at 5:22 PM, Jeff Squyres wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt; &gt; On Nov 30, 2009, at 10:48 AM, Sylvain Jeaugey wrote:
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; About my previous e-mail, I was wrong about all components having a 0
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; priority : it was based on default parameters reported by &quot;ompi_info -a |
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; grep routed&quot;. It seems that the truth is not always in ompi_info ...
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; ompi_info *does* always report the truth.  Those values are what the run-time thinks they are currently set to -- either via environment, file, or whatever other mechanism.  You might want to check your setup and see if they're being set via an unexpected mechanism...?  Try using the &quot;--parsable&quot; switch and grep for &quot;data_source&quot; to see where values are getting set from.
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; --
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Jeff Squyres
</span><br>
<span class="quotelev3">&gt;&gt; &gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt; &gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
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
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]
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
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="7170.php">Jeff Squyres: "Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm"</a>
<li><strong>Previous message:</strong> <a href="7168.php">Jeff Squyres: "Re: [OMPI devel] MPI_Graph_create"</a>
<li><strong>In reply to:</strong> <a href="7163.php">Jeff Squyres: "Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="7170.php">Jeff Squyres: "Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm"</a>
<li><strong>Reply:</strong> <a href="7170.php">Jeff Squyres: "Re: [OMPI devel] Deadlocks with new (routed) orted launch algorithm"</a>
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
