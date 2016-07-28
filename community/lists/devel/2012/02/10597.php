<?
$subject_val = "Re: [OMPI devel] 1.5.5rc2";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Feb 24 10:53:31 2012" -->
<!-- isoreceived="20120224155331" -->
<!-- sent="Fri, 24 Feb 2012 16:53:24 +0100" -->
<!-- isosent="20120224155324" -->
<!-- name="Matthias Jurenz" -->
<!-- email="matthias.jurenz_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] 1.5.5rc2" -->
<!-- id="201202241653.25254.matthias.jurenz_at_tu-dresden.de" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="4F4710FA.9030304_at_lbl.gov" -->
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
<strong>Subject:</strong> Re: [OMPI devel] 1.5.5rc2<br>
<strong>From:</strong> Matthias Jurenz (<em>matthias.jurenz_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-02-24 10:53:24
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10598.php">Paul H. Hargrove: "Re: [OMPI devel] 1.5.5rc2"</a>
<li><strong>Previous message:</strong> <a href="10596.php">Jeffrey Squyres: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r26039"</a>
<li><strong>In reply to:</strong> <a href="10591.php">Paul H. Hargrove: "Re: [OMPI devel] 1.5.5rc2"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="10601.php">Paul H. Hargrove: "[OMPI devel] 1.5.5rc2 atomics fail w/ xlc-9"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Thanks for the hint!
<br>
<p>This issue is fixed by r26042 (CMR #3037).
<br>
<p>Matthias
<br>
<p>On Friday 24 February 2012 05:24:26 Paul H. Hargrove wrote:
<br>
<span class="quotelev1">&gt; This is consistent with my findings w/ XLC (mostly on BG/L and BG/P
</span><br>
<span class="quotelev1">&gt; front end nodes).
</span><br>
<span class="quotelev1">&gt; None of the 7.0,  8.0, 9.0 or 11.1 versions of XLC I tested could
</span><br>
<span class="quotelev1">&gt; generate correct atomics.
</span><br>
<span class="quotelev1">&gt; They either failed at build time, or failed the tests in test/asm/.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On 2/23/2012 8:17 PM, Christopher Samuel wrote:
</span><br>
<span class="quotelev2">&gt; &gt; -----BEGIN PGP SIGNED MESSAGE-----
</span><br>
<span class="quotelev2">&gt; &gt; Hash: SHA1
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; On 24/02/12 15:12, Christopher Samuel wrote:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; I suspect this is irrelevant, but I got a build failure trying to
</span><br>
<span class="quotelev3">&gt; &gt;&gt; compile it on our BG/P front end node (login node) with the IBM XL
</span><br>
<span class="quotelev3">&gt; &gt;&gt; compilers.
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; Oops, forgot how I built it..
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; export
</span><br>
<span class="quotelev2">&gt; &gt; PATH=/opt/ibmcmp/vac/bg/9.0/bin/:/opt/ibmcmp/vacpp/bg/9.0/bin:/opt/ibmcmp
</span><br>
<span class="quotelev2">&gt; &gt; /xlf/bg/11.1/bin:$PATH
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; CC=xlc CXX=xlC F77=xlf ./configure&amp;&amp;  make
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; - --
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt;      Christopher Samuel - Senior Systems Administrator
</span><br>
<span class="quotelev2">&gt; &gt;   
</span><br>
<span class="quotelev2">&gt; &gt;   VLSCI - Victorian Life Sciences Computation Initiative
</span><br>
<span class="quotelev2">&gt; &gt;   Email: samuel_at_[hidden] Phone: +61 (0)3 903 55545
</span><br>
<span class="quotelev2">&gt; &gt;   
</span><br>
<span class="quotelev2">&gt; &gt;           <a href="http://www.vlsci.unimelb.edu.au/">http://www.vlsci.unimelb.edu.au/</a>
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; -----BEGIN PGP SIGNATURE-----
</span><br>
<span class="quotelev2">&gt; &gt; Version: GnuPG v1.4.11 (GNU/Linux)
</span><br>
<span class="quotelev2">&gt; &gt; Comment: Using GnuPG with Mozilla - <a href="http://enigmail.mozdev.org/">http://enigmail.mozdev.org/</a>
</span><br>
<span class="quotelev2">&gt; &gt; 
</span><br>
<span class="quotelev2">&gt; &gt; iEYEARECAAYFAk9HD1wACgkQO2KABBYQAh9EZgCcCz9x2i6KuE7/UpPzr194jHQD
</span><br>
<span class="quotelev2">&gt; &gt; rdcAni+dfEMhlqMzYMILn8jeS9yWlInu
</span><br>
<span class="quotelev2">&gt; &gt; =+rA4
</span><br>
<span class="quotelev2">&gt; &gt; -----END PGP SIGNATURE-----
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10598.php">Paul H. Hargrove: "Re: [OMPI devel] 1.5.5rc2"</a>
<li><strong>Previous message:</strong> <a href="10596.php">Jeffrey Squyres: "Re: [OMPI devel] [OMPI svn-full] svn:open-mpi r26039"</a>
<li><strong>In reply to:</strong> <a href="10591.php">Paul H. Hargrove: "Re: [OMPI devel] 1.5.5rc2"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="10601.php">Paul H. Hargrove: "[OMPI devel] 1.5.5rc2 atomics fail w/ xlc-9"</a>
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
