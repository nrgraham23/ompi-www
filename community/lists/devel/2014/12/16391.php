<?
$subject_val = "Re: [OMPI devel] RTLD_GLOBAL question";
include("../../include/msg-header.inc");
?>
<!-- received="Mon Dec  1 23:16:01 2014" -->
<!-- isoreceived="20141202041601" -->
<!-- sent="Mon, 1 Dec 2014 20:15:57 -0800" -->
<!-- isosent="20141202041557" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RTLD_GLOBAL question" -->
<!-- id="FF269567-F2C0-4FD3-9375-EE049B9AC094_at_open-mpi.org" -->
<!-- charset="windows-1252" -->
<!-- inreplyto="547D3B7F.3020303_at_iferc.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RTLD_GLOBAL question<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-12-01 23:15:57
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16392.php">Alvyn Liang: "Re: [OMPI devel] Setting up debug environment on Eclipse PTP"</a>
<li><strong>Previous message:</strong> <a href="16390.php">Gilles Gouaillardet: "Re: [OMPI devel] RTLD_GLOBAL question"</a>
<li><strong>In reply to:</strong> <a href="16390.php">Gilles Gouaillardet: "Re: [OMPI devel] RTLD_GLOBAL question"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16393.php">Artem Polyakov: "Re: [OMPI devel] RTLD_GLOBAL question"</a>
<li><strong>Reply:</strong> <a href="16393.php">Artem Polyakov: "Re: [OMPI devel] RTLD_GLOBAL question"</a>
<li><strong>Reply:</strong> <a href="16394.php">Gilles Gouaillardet: "Re: [OMPI devel] RTLD_GLOBAL question"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
If it isn&#146;t too much trouble, it would be good to confirm that it remains broken. I strongly suspect it is based on Moe&#146;s comments.
<br>
<p>Obviously, other people are making this work. For Intel MPI, all you do is point it at libpmi and they can run. However, they do explicitly dlopen it in their code, and I don&#146;t know what flags they might pass when they do so.
<br>
<p>If necessary, I suppose we could follow that pattern. In other words, rather than specifically linking the &#147;s1&#148; component to libpmi, instead require that the user point us to a pmi library via an MCA param, then explicitly dlopen that library with RTLD_GLOBAL. This avoids the issues cited by Jeff, but resolves the pmi linkage problem.
<br>
<p><p><span class="quotelev1">&gt; On Dec 1, 2014, at 8:09 PM, Gilles Gouaillardet &lt;gilles.gouaillardet_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; $ srun --version
</span><br>
<span class="quotelev1">&gt; slurm 2.6.6-VENDOR_PROVIDED
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; $ srun --mpi=pmi2 -n 1 ~/hw
</span><br>
<span class="quotelev1">&gt; I am 0 / 1
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; $ srun -n 1 ~/hw
</span><br>
<span class="quotelev1">&gt; /csc/home1/gouaillardet/hw: symbol lookup error: /usr/lib64/slurm/auth_munge.so: undefined symbol: slurm_verbose
</span><br>
<span class="quotelev1">&gt; srun: error: slurm_receive_msg: Zero Bytes were transmitted or received
</span><br>
<span class="quotelev1">&gt; srun: error: slurm_receive_msg[10.0.3.15]: Zero Bytes were transmitted or received
</span><br>
<span class="quotelev1">&gt; srun: error: soleil: task 0: Exited with exit code 127
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; $ ldd /usr/lib64/slurm/auth_munge.so
</span><br>
<span class="quotelev1">&gt;     linux-vdso.so.1 =&gt;  (0x00007fff54478000)
</span><br>
<span class="quotelev1">&gt;     libmunge.so.2 =&gt; /usr/lib64/libmunge.so.2 (0x00007f744760f000)
</span><br>
<span class="quotelev1">&gt;     libpthread.so.0 =&gt; /lib64/libpthread.so.0 (0x00007f74473f1000)
</span><br>
<span class="quotelev1">&gt;     libc.so.6 =&gt; /lib64/libc.so.6 (0x00007f744705d000)
</span><br>
<span class="quotelev1">&gt;     /lib64/ld-linux-x86-64.so.2 (0x0000003bf5400000)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; now, if i reling auth_munge.so so it depends on libslurm :
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; $ srun -n 1 ~/hw
</span><br>
<span class="quotelev1">&gt; srun: symbol lookup error: /usr/lib64/slurm/auth_munge.so: undefined symbol: slurm_auth_get_arg_desc
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; i can give a try to the latest slurm if needed
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Cheers,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Gilles
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On 2014/12/02 12:56, Ralph Castain wrote:
</span><br>
<span class="quotelev2">&gt;&gt; Out of curiosity - how are you testing these? I have more current versions of Slurm and would like to test the observations there.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Dec 1, 2014, at 7:49 PM, Gilles Gouaillardet &lt;gilles.gouaillardet_at_[hidden]&gt; &lt;mailto:gilles.gouaillardet_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I d like to make a step back ...
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; i previously tested with slurm 2.6.0, and it complained about the slurm_verbose symbol that is defined in libslurm.so
</span><br>
<span class="quotelev3">&gt;&gt;&gt; so with slurm 2.6.0, RTLD_GLOBAL or relinking is ok
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; now i tested with slurm 2.6.6 and it complains about the slurm_auth_get_arg_desc symbol, and this symbol is not
</span><br>
<span class="quotelev3">&gt;&gt;&gt; defined in any dynamic library. it is internally defined in the static libcommon.a library, which is used to build the slurm binaries.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; as far as i understand, auth_munge.so can only be invoked from a slurm binary, which means it cannot be invoked from an mpi application
</span><br>
<span class="quotelev3">&gt;&gt;&gt; even if it is linked with libslurm, libpmi, ...
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; that looks like a slurm design issue that the slurm folks will take care of.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Cheers,
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Gilles
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On 2014/12/02 12:33, Ralph Castain wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Another option is to simply add the -lslurm -lauth flags to the pmix/s1 component as this is the only place that requires it, and it won&#146;t hurt anything to do so.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Dec 1, 2014, at 6:03 PM, Gilles Gouaillardet &lt;gilles.gouaillardet_at_[hidden]&gt; &lt;mailto:gilles.gouaillardet_at_[hidden]&gt; &lt;mailto:gilles.gouaillardet_at_[hidden]&gt; &lt;mailto:gilles.gouaillardet_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Jeff,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; FWIW, you can read my analysis of what is going wrong at
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php">http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php">http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php">http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php">http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php">http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php">http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php">http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php">http://www.open-mpi.org/community/lists/pmix-devel/2014/11/0293.php</a>&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; bottom line, i agree this is a slurm issue (slurm plugin should depend
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; on libslurm, but they do not, yet)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; a possible workaround would be to make the pmi component a &quot;proxy&quot; that
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; dlopen with RTLD_GLOBAL the &quot;real&quot; component in which the job is done.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; that being said, the impact is quite limited (no direct launch in slurm
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; with pmi1, but pmi2 works fine) so it makes sense not to work around
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; someone else problem.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; and that being said, configure could detect this broken pmi1 and not
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; build pmi1 support or print a user friendly error message if pmi1 is used.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; any thoughts ?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Cheers,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Gilles
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On 2014/12/02 7:47, Jeff Squyres (jsquyres) wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Ok, if the problem is moot, great.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; (sidenote: this is moot, so ignore this if you want: with this explanation, I'm still not sure how RTLD_GLOBAL fixes the issue)
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; On Dec 1, 2014, at 5:15 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; &lt;mailto:rhc_at_[hidden]&gt; &lt;mailto:rhc_at_[hidden]&gt; &lt;mailto:rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Easy enough to explain. We link libpmi into the pmix/s1 component. This library is missing the linkage to libslurm that contains the linkage to libauth where munge resides. So when we call a PMI function, libpmi references a call to munge for authentication and hits an &#147;unresolved symbol&#148; error.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Moe acknowledges the error is in Slurm and is fixing the linkages so this problem goes away
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; On Dec 1, 2014, at 2:13 PM, Jeff Squyres (jsquyres) &lt;jsquyres_at_[hidden]&gt; &lt;mailto:jsquyres_at_[hidden]&gt; &lt;mailto:jsquyres_at_[hidden]&gt; &lt;mailto:jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; On Dec 1, 2014, at 5:07 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; &lt;mailto:rhc_at_[hidden]&gt; &lt;mailto:rhc_at_[hidden]&gt; &lt;mailto:rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; FWIW: It&#146;s Slurm&#146;s pmi-1 library that isn&#146;t linked correctly against its dependencies (the pmi-2 one is correct).  Moe is aware of the problem and fixing it on their side. This won&#146;t help existing installations until they upgrade, but I tend to agree with Jeff about not fixing other people&#146;s problems.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Can you explain what is happening?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; I ask because I'm not sure I understand the problem such that using RTLD_GLOBAL would fix it.  I.e., even if libpmi1.so isn't linked against its dependencies properly, that shouldn't cause a problem if OMPI components A and B are both linked against libpmi1.so, and then A is loaded, and then B is loaded.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; ...or perhaps we can just discuss this on the call tomorrow?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; -- 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; jsquyres_at_[hidden] &lt;mailto:jsquyres_at_[hidden]&gt; &lt;mailto:jsquyres_at_[hidden]&gt; &lt;mailto:jsquyres_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a> &lt;<a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>&gt; &lt;<a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>&gt; &lt;<a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/12/16383.php">http://www.open-mpi.org/community/lists/devel/2014/12/16383.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16383.php">http://www.open-mpi.org/community/lists/devel/2014/12/16383.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16383.php">http://www.open-mpi.org/community/lists/devel/2014/12/16383.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16383.php">http://www.open-mpi.org/community/lists/devel/2014/12/16383.php</a>&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/12/16384.php">http://www.open-mpi.org/community/lists/devel/2014/12/16384.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16384.php">http://www.open-mpi.org/community/lists/devel/2014/12/16384.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16384.php">http://www.open-mpi.org/community/lists/devel/2014/12/16384.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16384.php">http://www.open-mpi.org/community/lists/devel/2014/12/16384.php</a>&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/12/16386.php">http://www.open-mpi.org/community/lists/devel/2014/12/16386.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16386.php">http://www.open-mpi.org/community/lists/devel/2014/12/16386.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16386.php">http://www.open-mpi.org/community/lists/devel/2014/12/16386.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16386.php">http://www.open-mpi.org/community/lists/devel/2014/12/16386.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16386.php">http://www.open-mpi.org/community/lists/devel/2014/12/16386.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16386.php">http://www.open-mpi.org/community/lists/devel/2014/12/16386.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16386.php">http://www.open-mpi.org/community/lists/devel/2014/12/16386.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16386.php">http://www.open-mpi.org/community/lists/devel/2014/12/16386.php</a>&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt; &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt; &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/12/16387.php">http://www.open-mpi.org/community/lists/devel/2014/12/16387.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16387.php">http://www.open-mpi.org/community/lists/devel/2014/12/16387.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16387.php">http://www.open-mpi.org/community/lists/devel/2014/12/16387.php</a>&gt; &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16387.php">http://www.open-mpi.org/community/lists/devel/2014/12/16387.php</a>&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/12/16388.php">http://www.open-mpi.org/community/lists/devel/2014/12/16388.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16388.php">http://www.open-mpi.org/community/lists/devel/2014/12/16388.php</a>&gt;
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a> &lt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/12/16389.php">http://www.open-mpi.org/community/lists/devel/2014/12/16389.php</a> &lt;<a href="http://www.open-mpi.org/community/lists/devel/2014/12/16389.php">http://www.open-mpi.org/community/lists/devel/2014/12/16389.php</a>&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/12/16390.php">http://www.open-mpi.org/community/lists/devel/2014/12/16390.php</a>
</span><br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-16391/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16392.php">Alvyn Liang: "Re: [OMPI devel] Setting up debug environment on Eclipse PTP"</a>
<li><strong>Previous message:</strong> <a href="16390.php">Gilles Gouaillardet: "Re: [OMPI devel] RTLD_GLOBAL question"</a>
<li><strong>In reply to:</strong> <a href="16390.php">Gilles Gouaillardet: "Re: [OMPI devel] RTLD_GLOBAL question"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16393.php">Artem Polyakov: "Re: [OMPI devel] RTLD_GLOBAL question"</a>
<li><strong>Reply:</strong> <a href="16393.php">Artem Polyakov: "Re: [OMPI devel] RTLD_GLOBAL question"</a>
<li><strong>Reply:</strong> <a href="16394.php">Gilles Gouaillardet: "Re: [OMPI devel] RTLD_GLOBAL question"</a>
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
