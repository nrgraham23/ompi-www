<?
$subject_val = "Re: [OMPI devel] mca_mtl_psm and java";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Aug 25 21:44:15 2015" -->
<!-- isoreceived="20150826014415" -->
<!-- sent="Wed, 26 Aug 2015 10:44:05 +0900" -->
<!-- isosent="20150826014405" -->
<!-- name="Gilles Gouaillardet" -->
<!-- email="gilles.gouaillardet_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] mca_mtl_psm and java" -->
<!-- id="CAAkFZ5ukdZpO1sP=Yskv70aahcgQ7Ovx=iXAroQ4-jWxaMLUWg_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="CAAvDA16_EwEmuHB-X6WGJwMwd+LKdPC74Bf595=e0hCCfVhn5g_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] mca_mtl_psm and java<br>
<strong>From:</strong> Gilles Gouaillardet (<em>gilles.gouaillardet_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-08-25 21:44:05
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17861.php">Howard Pritchard: "Re: [OMPI devel] mca_mtl_psm and java"</a>
<li><strong>Previous message:</strong> <a href="17859.php">Paul Hargrove: "Re: [OMPI devel] mca_mtl_psm and java"</a>
<li><strong>In reply to:</strong> <a href="17859.php">Paul Hargrove: "Re: [OMPI devel] mca_mtl_psm and java"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Thanks Paul,
<br>
<p>I will give it a try
<br>
<p>Cheers,
<br>
<p>Gilles
<br>
<p>On Wednesday, August 26, 2015, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Gilles,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Is the conflict over &quot;SIG32&quot;?
</span><br>
<span class="quotelev1">&gt; If so, I believe setenv PSM_RCVTHREAD=0 in the environment will disable
</span><br>
<span class="quotelev1">&gt; InfiniPath's use of that signal.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Tue, Aug 25, 2015 at 6:02 PM, Gilles Gouaillardet &lt;
</span><br>
<span class="quotelev1">&gt; gilles.gouaillardet_at_[hidden]
</span><br>
<span class="quotelev1">&gt; &lt;javascript:_e(%7B%7D,'cvml','gilles.gouaillardet_at_[hidden]');&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; i run on a centos 7 vm, and with the OFED that comes with centos
</span><br>
<span class="quotelev2">&gt;&gt; (I will send full details tomorrow)
</span><br>
<span class="quotelev2">&gt;&gt; there is no psm hardware, just infinipath libs
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; a first trivial workaround in ompi would be to
</span><br>
<span class="quotelev2">&gt;&gt; putenv(&quot;OMPI_MCA_mtl_psm_priority=0&quot;)
</span><br>
<span class="quotelev2">&gt;&gt; in the java binding before invoking ompi_mpi_init,
</span><br>
<span class="quotelev2">&gt;&gt; but that cannot works because libinfinipath is dlopen'ed and it's signal
</span><br>
<span class="quotelev2">&gt;&gt; handler is set
</span><br>
<span class="quotelev2">&gt;&gt; also, I guess putenv(&quot;OMPI_MCA_mtl=^psm&quot;) would not work if ompi was
</span><br>
<span class="quotelev2">&gt;&gt; configure'd with--disable-dlopen
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Cheers,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Gilles
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Wednesday, August 26, 2015, Ralph Castain &lt;rhc_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; &lt;javascript:_e(%7B%7D,'cvml','rhc_at_[hidden]');&gt;&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Gilles: what version of PSM were you using? and with which cards?
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Aug 25, 2015, at 9:32 AM, Nathaniel Graham &lt;nrgraham23_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; What if we modify the mpirun script to include the --mca mtl ^psm tag if
</span><br>
<span class="quotelev3">&gt;&gt;&gt; java is in the run string?
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -Nathan
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Tue, Aug 25, 2015 at 9:47 AM, Howard Pritchard &lt;hppritcha_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I'll update the java FAQ.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 2015-08-25 8:36 GMT-06:00 Jeff Squyres (jsquyres) &lt;jsquyres_at_[hidden]&gt;:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Aug 25, 2015, at 10:00 AM, Howard Pritchard &lt;hppritcha_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; I think rather than trying workarounds of dubious robustness inside
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; open mpi we
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; - dicument the issue on either the somewhat aged open mpi website
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; faq or add it to a wiki page on github
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; It should probably be documented in the README and the FAQ.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I'd be against adding user documentation to the wiki -- this would be
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; a 3rd place for users to look for information.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; - file a bug against  intel psm
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I'd like to hear what they have to say first... :-)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; ----------
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; sent from my smart phonr so no good type.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Howard
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; On Aug 25, 2015 6:02 AM, &quot;Gilles Gouaillardet&quot; &lt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; gilles.gouaillardet_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; i do not know if this can be runtime detected ...
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; note we should report this to intel folks and ask them to advise.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; ideally, they would provide a way to make sure libinfinipath.so does
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; not conflict with the jvm signal handlers.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; my idea is to dlopen libinfinipath only if java bindings are not
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; used.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; On Tuesday, August 25, 2015, Jeff Squyres (jsquyres) &lt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Is it possible to run-time detect this situation?  E.g., probe the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; signal handler, or somesuch.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Rationale: I'd rather have something run-time disabled than not
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; built.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Would dlopen'ing libinfinipath change actually change its signal
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; handler behavior?
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; On Aug 25, 2015, at 4:27 AM, Gilles Gouaillardet &lt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; gilles_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; Folks,
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; some time ago, some crashes were reported when using java bindings.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; one of them was caused was caused by mca_mtl_psm.so.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; the root cause is libinfinipath.so initializer sets its own signal
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; handler, which
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; conflicts with the signal handler sets by the jvm.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; the only workaround is to disable the psm mtl
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; (e.g. mpirun --mca mtl ^psm ...)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; since mpirun --mca mtl_psm_priority 0 ... does not work
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; (libinfinipath.so is loaded, so the initializer is ran and the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; signal handlers are set)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; so the psm mtl cannot be disabled by the Java MPI_Init()
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; one option is to document this
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; an other option is not to build the psm mtl if java bindings are
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; built
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; and an other option is to revamp mca_mtl_psm.so so it does not
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; link with libinfinipath.so
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; (use an intermediate component, or dlopen libinfinipath)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; any thoughts ?
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; Cheers,
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; Gilles
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt; &gt; &gt; Link to this post:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/08/17838.php">http://www.open-mpi.org/community/lists/devel/2015/08/17838.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; --
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Jeff Squyres
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Link to this post:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/08/17840.php">http://www.open-mpi.org/community/lists/devel/2015/08/17840.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Link to this post:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/08/17841.php">http://www.open-mpi.org/community/lists/devel/2015/08/17841.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; Link to this post:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/08/17845.php">http://www.open-mpi.org/community/lists/devel/2015/08/17845.php</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/08/17847.php">http://www.open-mpi.org/community/lists/devel/2015/08/17847.php</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Link to this post:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/08/17849.php">http://www.open-mpi.org/community/lists/devel/2015/08/17849.php</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Link to this post:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/08/17851.php">http://www.open-mpi.org/community/lists/devel/2015/08/17851.php</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden] &lt;javascript:_e(%7B%7D,'cvml','devel_at_[hidden]');&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post:
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/08/17857.php">http://www.open-mpi.org/community/lists/devel/2015/08/17857.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev1">&gt; &lt;javascript:_e(%7B%7D,'cvml','PHHargrove_at_[hidden]');&gt;
</span><br>
<span class="quotelev1">&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev1">&gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-17860/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17861.php">Howard Pritchard: "Re: [OMPI devel] mca_mtl_psm and java"</a>
<li><strong>Previous message:</strong> <a href="17859.php">Paul Hargrove: "Re: [OMPI devel] mca_mtl_psm and java"</a>
<li><strong>In reply to:</strong> <a href="17859.php">Paul Hargrove: "Re: [OMPI devel] mca_mtl_psm and java"</a>
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
