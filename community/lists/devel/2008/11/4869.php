<?
$subject_val = "Re: [OMPI devel] libevent";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Nov  7 13:47:23 2008" -->
<!-- isoreceived="20081107184723" -->
<!-- sent="Fri, 7 Nov 2008 13:47:10 -0500" -->
<!-- isosent="20081107184710" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] libevent" -->
<!-- id="D1CF7387-6DA1-4376-94AD-79B40D8BD4A3_at_eecs.utk.edu" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="491489C0.5040000_at_aomail.uab.es" -->
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
<strong>Subject:</strong> Re: [OMPI devel] libevent<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2008-11-07 13:47:10
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="4870.php">George Bosilca: "Re: [OMPI devel] Amateur Guidance"</a>
<li><strong>Previous message:</strong> <a href="4868.php">Leonardo Fialho: "[OMPI devel] libevent"</a>
<li><strong>In reply to:</strong> <a href="4868.php">Leonardo Fialho: "[OMPI devel] libevent"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="4871.php">Leonardo Fialho: "Re: [OMPI devel] libevent"</a>
<li><strong>Reply:</strong> <a href="4871.php">Leonardo Fialho: "Re: [OMPI devel] libevent"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Leonardo,
<br>
<p>All events generated by the libevent are catched internally by the  
<br>
ompi library, but are not propagated until the next call to  
<br>
opal_progress. If you want to use alarms that trigger outside the  
<br>
opal_progress you will have to deal directly with the libevent (and  
<br>
not use ORTE_TIMER_EVENT).
<br>
<p>&nbsp;&nbsp;&nbsp;george.
<br>
<p>On Nov 7, 2008, at 1:32 PM, Leonardo Fialho wrote:
<br>
<p><span class="quotelev1">&gt; Hi All,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Does the libevent works with an application which does not  
</span><br>
<span class="quotelev1">&gt; communicate?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; i.e. I have an application which does not receive or send messages  
</span><br>
<span class="quotelev1">&gt; for a long time, but on the PML layer a have defined some event  
</span><br>
<span class="quotelev1">&gt; using the ORTE_TIMER_EVENT(time, func) macro. This macro will be  
</span><br>
<span class="quotelev1">&gt; should be called after time seconds, no? On my tests it does not  
</span><br>
<span class="quotelev1">&gt; occur, only if any communication occurs.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Did I made any mistake?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Leonardo Fialho
</span><br>
<span class="quotelev1">&gt; Computer Architecture and Operating Systems Department - CAOS
</span><br>
<span class="quotelev1">&gt; Universidad Autonoma de Barcelona - UAB
</span><br>
<span class="quotelev1">&gt; ETSE, Edifcio Q, QC/3088
</span><br>
<span class="quotelev1">&gt; <a href="http://www.caos.uab.es">http://www.caos.uab.es</a>
</span><br>
<span class="quotelev1">&gt; Phone: +34-93-581-2888
</span><br>
<span class="quotelev1">&gt; Fax: +34-93-581-2478
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
<p><p>
<br><hr>
<ul>
<li>application/pkcs7-signature attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-4869/smime.p7s">smime.p7s</a>
</ul>
<!-- attachment="smime.p7s" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="4870.php">George Bosilca: "Re: [OMPI devel] Amateur Guidance"</a>
<li><strong>Previous message:</strong> <a href="4868.php">Leonardo Fialho: "[OMPI devel] libevent"</a>
<li><strong>In reply to:</strong> <a href="4868.php">Leonardo Fialho: "[OMPI devel] libevent"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="4871.php">Leonardo Fialho: "Re: [OMPI devel] libevent"</a>
<li><strong>Reply:</strong> <a href="4871.php">Leonardo Fialho: "Re: [OMPI devel] libevent"</a>
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
