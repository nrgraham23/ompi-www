<?
$subject_val = "Re: [OMPI devel] mpi/java question";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Feb 20 17:47:36 2013" -->
<!-- isoreceived="20130220224736" -->
<!-- sent="Wed, 20 Feb 2013 22:47:31 +0000" -->
<!-- isosent="20130220224731" -->
<!-- name="Jeff Squyres (jsquyres)" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] mpi/java question" -->
<!-- id="EF66BBEB19BADC41AC8CCF5F684F07FC43F4E6CD_at_xmb-rcd-x01.cisco.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="7884BCDCDF0B084E9B380CD8AB04D78613B5B9_at_NP1EXMB025.corp.halliburton.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] mpi/java question<br>
<strong>From:</strong> Jeff Squyres (jsquyres) (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-02-20 17:47:31
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="12151.php">Vallee, Geoffroy R.: "[OMPI devel] Patch for the SM BTL - Remove explicit reference to ORTE data structures"</a>
<li><strong>Previous message:</strong> <a href="12149.php">Steve Angelovich: "Re: [OMPI devel] mpi/java question"</a>
<li><strong>In reply to:</strong> <a href="12149.php">Steve Angelovich: "Re: [OMPI devel] mpi/java question"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I committed a fix to the trunk to use the fixed size datatypes.
<br>
<p>I don't know offhand if the reduction type you need is defined on 64 bit types...?
<br>
<p><p>On Feb 20, 2013, at 5:41 PM, Steve Angelovich &lt;SAngelovich_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Sorry I lost track of all the comments in the thread.  Does this mean it 
</span><br>
<span class="quotelev1">&gt; is fixed or will be fixed?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Thanks,
</span><br>
<span class="quotelev1">&gt; Steve
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On 02/20/2013 02:15 PM, Jeff Squyres (jsquyres) wrote:
</span><br>
<span class="quotelev2">&gt;&gt; I didn't misspeak in my email.  :-)
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; That being said:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 1. If the Java sizes are fixed, great.  It should make writing configury to find matching C types easier (because we know what the Java sizes are).
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 2. George raises a good point: we support the MPI_INTx_T datatypes now, which probably obviates the need for any extra configury (since the Java sizes are fixed).
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Feb 20, 2013, at 3:44 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Might be just fine - need to see how many of the types have issues, how best to correct them
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Feb 20, 2013, at 12:32 PM, George Bosilca &lt;bosilca_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; That is wrong with MPI_INT64_T ? (MPI 3.0 standard page 26.)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; George.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Feb 20, 2013, at 21:12 , Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Feb 20, 2013, at 12:08 PM, Dmitri Gribenko &lt;gribozavr_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; On Wed, Feb 20, 2013 at 10:05 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; On Feb 20, 2013, at 11:39 AM, Dmitri Gribenko &lt;gribozavr_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; On Wed, Feb 20, 2013 at 9:34 PM, Jeff Squyres (jsquyres)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; &lt;jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; If someone could write some generic java code to figure out the size of a java type (and either printf it out, or write it to a file, or otherwise be able to give that value to a shell script), that would be a good start.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; No need for that -- type sizes in Java are fixed.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://docs.oracle.com/javase/tutorial/java/nutsandbolts/datatypes.html">http://docs.oracle.com/javase/tutorial/java/nutsandbolts/datatypes.html</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; True - but the ones on the C-side are not, and that's the problem.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; My point was that there is no need to write java code to detect type
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; sizes.  About C types -- don't we already check those anyway?  Sure,
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; we need to match these with java side, but there's no need to write
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; new code to check type sizes.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I think you misunderstood - we are talking about writing build-system code that matches the discovered C-type sizes to the corresponding known Java type. This is the source of the reported problem.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; And yes - Jeff misspoke in his note. I've straightened him out over the phone. :-)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Dmitri
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; -- 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; main(i,j){for(i=2;;i++){for(j=2;j&lt;i;j++){if(!(i%j)){j=0;break;}}if
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; (j){printf(&quot;%d\n&quot;,i);}}} /*Dmitri Gribenko &lt;gribozavr_at_[hidden]&gt;*/
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; ----------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; This e-mail, including any attached files, may contain confidential and privileged information for the sole use of the intended recipient.  Any review, use, distribution, or disclosure by others is strictly prohibited.  If you are not the intended recipient (or authorized to receive information for the intended recipient), please contact the sender by reply e-mail and delete all copies of this message.
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
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="12151.php">Vallee, Geoffroy R.: "[OMPI devel] Patch for the SM BTL - Remove explicit reference to ORTE data structures"</a>
<li><strong>Previous message:</strong> <a href="12149.php">Steve Angelovich: "Re: [OMPI devel] mpi/java question"</a>
<li><strong>In reply to:</strong> <a href="12149.php">Steve Angelovich: "Re: [OMPI devel] mpi/java question"</a>
<!-- nextthread="start" -->
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
