<?
$subject_val = "Re: [OMPI devel] 1.8.3 and PSM errors";
include("../../include/msg-header.inc");
?>
<!-- received="Wed Nov 12 11:19:49 2014" -->
<!-- isoreceived="20141112161949" -->
<!-- sent="Wed, 12 Nov 2014 09:19:49 -0700" -->
<!-- isosent="20141112161949" -->
<!-- name="Howard Pritchard" -->
<!-- email="hppritcha_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] 1.8.3 and PSM errors" -->
<!-- id="CAF1Cqj79wu8zBDBH6qmbr5=Yr4=JteR+UxtA-XSqqZuW5EqTSQ_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="4DEF2ABD-6A88-462B-9FDB-3D1A7EFEE974_at_hft-stuttgart.de" -->
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
<strong>Subject:</strong> Re: [OMPI devel] 1.8.3 and PSM errors<br>
<strong>From:</strong> Howard Pritchard (<em>hppritcha_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-11-12 11:19:49
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16304.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 1.8.3 and PSM errors"</a>
<li><strong>Previous message:</strong> <a href="16302.php">Ralph Castain: "[OMPI devel] 1.8.4 release delayed"</a>
<li><strong>In reply to:</strong> <a href="16299.php">Rainer Keller: "Re: [OMPI devel] 1.8.3 and PSM errors"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16304.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 1.8.3 and PSM errors"</a>
<li><strong>Reply:</strong> <a href="16304.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 1.8.3 and PSM errors"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
HI Folks,
<br>
<p>I think this is a bug in the PSM MTL add_procs.  The call to psm_ep_connect
<br>
needs to be taking previously connected ep's into account,
<br>
much like what is done in the libfabric psm provider code.
<br>
<p>Howard
<br>
<p><p>2014-11-12 3:12 GMT-07:00 Rainer Keller &lt;rainer.keller_at_[hidden]&gt;:
<br>
<p><span class="quotelev1">&gt; Dear Andrew,
</span><br>
<span class="quotelev1">&gt; no, this is not done with dynamically connecting jobs.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; The failing tests use a communicator, which is setup by merging back an
</span><br>
<span class="quotelev1">&gt; intercommunicator (MPI_Intercomm_merge), which was first split from
</span><br>
<span class="quotelev1">&gt; MPI_COMM_WORLD (MPI_Intercomm_create).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Please see tst_comm.c:459
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Best regards,
</span><br>
<span class="quotelev1">&gt; Rainer
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On 11.11.2014, at 23:44, &quot;Friedley, Andrew&quot; &lt;andrew.friedley_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt; &gt; Ralph,
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; You're right that PSM wouldn't support dynamically connecting jobs.  I
</span><br>
<span class="quotelev1">&gt; don't think intercomm_create implies that though.  For example you could
</span><br>
<span class="quotelev1">&gt; split COMM_WORLD's group into two groups, then create an intercommunicator
</span><br>
<span class="quotelev1">&gt; across those two groups.  I'm guessing that's what this test is doing, I'd
</span><br>
<span class="quotelev1">&gt; have to go read the code to be sure though.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; I verified this tests works over PSM and OMPI 1.6.5; it fails on 1.8.1
</span><br>
<span class="quotelev1">&gt; and 1.8.3.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Andrew
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; -----Original Message-----
</span><br>
<span class="quotelev3">&gt; &gt;&gt; From: devel [mailto:devel-bounces_at_[hidden]] On Behalf Of Ralph
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Castain
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Sent: Tuesday, November 11, 2014 2:23 PM
</span><br>
<span class="quotelev3">&gt; &gt;&gt; To: Open MPI Developers
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Subject: Re: [OMPI devel] 1.8.3 and PSM errors
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; I thought PSM didn&#226;&#128;&#153;t support dynamic operations such as Intercomm_create
</span><br>
<span class="quotelev3">&gt; &gt;&gt; - yes? The PSM security key wouldn&#226;&#128;&#153;t match between the two jobs, and so
</span><br>
<span class="quotelev3">&gt; &gt;&gt; there is no way for them to communicate.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Which is why I thought PSM can&#226;&#128;&#153;t be used for dynamic operations at all,
</span><br>
<span class="quotelev3">&gt; &gt;&gt; including comm_spawn and connect/accept
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; On Nov 11, 2014, at 2:13 PM, Jeff Squyres (jsquyres) &lt;
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; wrote:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; On Nov 11, 2014, at 4:56 PM, Friedley, Andrew
</span><br>
<span class="quotelev3">&gt; &gt;&gt; &lt;andrew.friedley_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; OK, I'm able to reproduce this now, not sure why I couldn't before.
</span><br>
<span class="quotelev1">&gt; I took
</span><br>
<span class="quotelev3">&gt; &gt;&gt; a look at the diff of the PSM MTL from 1.6.5 to 1.8.1, and nothing is
</span><br>
<span class="quotelev1">&gt; standing
</span><br>
<span class="quotelev3">&gt; &gt;&gt; out to me.
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; Question more for the general group:  Did anything related to the
</span><br>
<span class="quotelev3">&gt; &gt;&gt; behavior/usage of MTL add_procs() change in this time window?
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; The time between the 1.6.x series and the 1.8.x series is measure in
</span><br>
<span class="quotelev1">&gt; terms
</span><br>
<span class="quotelev3">&gt; &gt;&gt; of a year or two, so, ya, something might have changed...
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; More particularly, it looks like add_procs is being called a second
</span><br>
<span class="quotelev1">&gt; time
</span><br>
<span class="quotelev3">&gt; &gt;&gt; during MPI_Intercomm_create and being passed a process that is already
</span><br>
<span class="quotelev3">&gt; &gt;&gt; connected (passed into the first add_procs call).  Is that right?
</span><br>
<span class="quotelev1">&gt; Should the
</span><br>
<span class="quotelev3">&gt; &gt;&gt; MTL handle multiple add_procs calls with the same proc provided?
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; I'm afraid I don't know much about the MTL interface.
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; George / Nathan?
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; For corporate legal information go to:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Link to this post: <a href="http://www.open">http://www.open</a>-
</span><br>
<span class="quotelev3">&gt; &gt;&gt; mpi.org/community/lists/devel/2014/11/16294.php
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Link to this post: <a href="http://www.open">http://www.open</a>-
</span><br>
<span class="quotelev3">&gt; &gt;&gt; mpi.org/community/lists/devel/2014/11/16295.php
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt; &gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16296.php">http://www.open-mpi.org/community/lists/devel/2014/11/16296.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; ---------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; Prof. Dr.-Ing. Rainer Keller
</span><br>
<span class="quotelev1">&gt; Hochschule f&#195;&#188;r Technik Stuttgart
</span><br>
<span class="quotelev1">&gt; Fakult&#195;&#164;t f&#195;&#188;r Vermessung, Informatik und Mathematik
</span><br>
<span class="quotelev1">&gt; Schellingstr. 24, Raum 2/449
</span><br>
<span class="quotelev1">&gt; 70174 Stuttgart
</span><br>
<span class="quotelev1">&gt; T.: +49 (0)711 8926-2812
</span><br>
<span class="quotelev1">&gt; F.: +49 (0)711 8926-2553
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2014/11/16299.php">http://www.open-mpi.org/community/lists/devel/2014/11/16299.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-16303/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16304.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 1.8.3 and PSM errors"</a>
<li><strong>Previous message:</strong> <a href="16302.php">Ralph Castain: "[OMPI devel] 1.8.4 release delayed"</a>
<li><strong>In reply to:</strong> <a href="16299.php">Rainer Keller: "Re: [OMPI devel] 1.8.3 and PSM errors"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16304.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 1.8.3 and PSM errors"</a>
<li><strong>Reply:</strong> <a href="16304.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] 1.8.3 and PSM errors"</a>
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
