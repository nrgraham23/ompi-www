<?
$subject_val = "Re: [OMPI devel] 1.7 rc4 compilation error";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Oct 30 10:28:15 2012" -->
<!-- isoreceived="20121030142815" -->
<!-- sent="Tue, 30 Oct 2012 09:28:13 -0500" -->
<!-- isosent="20121030142813" -->
<!-- name="Edgar Gabriel" -->
<!-- email="gabriel_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] 1.7 rc4 compilation error" -->
<!-- id="508FE3FD.7090001_at_cs.uh.edu" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="508FD62A.7000707_at_cs.uh.edu" -->
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
<strong>Subject:</strong> Re: [OMPI devel] 1.7 rc4 compilation error<br>
<strong>From:</strong> Edgar Gabriel (<em>gabriel_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-10-30 10:28:13
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11669.php">Guillaume.Papaure_at_[hidden]: "[OMPI devel] Linking with slurm pmi when slurm is not in a standard path"</a>
<li><strong>Previous message:</strong> <a href="11667.php">Edgar Gabriel: "Re: [OMPI devel] 1.7 rc4 compilation error"</a>
<li><strong>In reply to:</strong> <a href="11667.php">Edgar Gabriel: "Re: [OMPI devel] 1.7 rc4 compilation error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11673.php">Ralph Castain: "Re: [OMPI devel] 1.7 rc4 compilation error"</a>
<li><strong>Reply:</strong> <a href="11673.php">Ralph Castain: "Re: [OMPI devel] 1.7 rc4 compilation error"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
ok, so a couple of things.
<br>
<p>I still think it is the same issue that I observed 1-2 days ago. Could
<br>
you try to remove the fs/lustre component from your compilation, e.g. by
<br>
adding an .ompi_ignore file into that directory, and see whether this
<br>
fixes the issue?
<br>
<p>I tried on my machine (no lustre, no ib) compilations with
<br>
--disable-mpi-io *or* --disable-io-romio, and both worked correctly and
<br>
I could run things. Note, that the flags are truly different meanwhile,
<br>
since the second flag is now equivalent to --enable-mca-no-build=io:romio
<br>
The first flag disables the io, fcoll, fs and sharedfp frameworks.
<br>
(prior to ompio they had basically the same effect).
<br>
<p>In your particular case this means, that you disabled romio, but the
<br>
entire ompio stack is still compiled, and error must come from that
<br>
portion. If my suspecion is correct, it is still liblustre
<br>
messing around with the malloc hooks, and that causes the stack frame to
<br>
be completely broken. I thought I fixed that since we did not have the
<br>
issue on trunk, but we did observe that in the 1.7 branch 1-2 days back
<br>
as well, and I was looking into that.
<br>
<p>That being said, there is another malloc-hooks issue that makes me a bit
<br>
nervous. The compilation of the otf stuff produced a ton of warnings on
<br>
my machine with gcc4.6.2 also with respect to the _malloc_hooks and
<br>
_realloc_hooks. Not sure whether this contributed to the problem as
<br>
well, just thought I bring it up since we seem to have a corrupted stack
<br>
frame problem.
<br>
<p>Thanks
<br>
Edgar
<br>
<p><p>On 10/30/2012 8:29 AM, Edgar Gabriel wrote:
<br>
<span class="quotelev1">&gt; ok, I'll look into this. I noticed a problem with static builds on
</span><br>
<span class="quotelev1">&gt; lustre file systems recently, and I was wandering whether its the same
</span><br>
<span class="quotelev1">&gt; issue or not. But I'll check what's going on.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; THanks
</span><br>
<span class="quotelev1">&gt; Edgar
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On 10/30/2012 7:22 AM, Ralph Castain wrote:
</span><br>
<span class="quotelev2">&gt;&gt; No to Lustre, and I didn't build static
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I'm not sure what, if any, parallel file system might be present. In the case that works, I just built with no configure args other than prefix. ompi_info shows both romio and mpio built, but nothing more about what support they built internally.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Oct 30, 2012, at 4:14 AM, Edgar Gabriel &lt;gabriel_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Ralph,
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; just out curiosity: is there a lustre file system on the machine and is
</span><br>
<span class="quotelev3">&gt;&gt;&gt; this a static build ?
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Thanks
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Edgar
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On 10/29/2012 9:17 PM, Ralph Castain wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Hmmm...I added that directory and tried this on odin (which is an IB-based machine). Any MPI proc segfaults:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Core was generated by `./hello'.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Program terminated with signal 11, Segmentation fault.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; w#0  _sysio_p_validate (pno=0x0, intnt=0x0, path=0x0) at src/inode.c:574
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 574	src/inode.c: No such file or directory.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 	in src/inode.c
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; (gdb) where
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #0  _sysio_p_validate (pno=0x0, intnt=0x0, path=0x0) at src/inode.c:574
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #1  0x00002aaaabd3f3e9 in _sysio_path_walk (parent=0x0, nd=0x7fffffffd8e0) at src/namei.c:216
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #2  0x00002aaaabd3faad in _sysio_namei (parent=0x0, path=&lt;value optimized out&gt;, flags=0, intnt=0x7fffffffd950, pnop=0x7fffffffd970) at src/namei.c:505
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #3  0x00002aaaabd3fd98 in open (path=0x2aaaac24280f &quot;/sys/devices/system/node&quot;, flags=&lt;value optimized out&gt;) at src/open.c:179
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #4  0x00002aaaabd43d5b in opendir (name=0x2aaaac24280f &quot;/sys/devices/system/node&quot;) at src/stddir.c:60
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #5  0x00002aaaac241825 in numa_max_node () from /usr/lib64/libnuma.so.1
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #6  0x00002aaaac241d13 in numa_init () from /usr/lib64/libnuma.so.1
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #7  0x00002aaaaaab845b in call_init () from /lib64/ld-linux-x86-64.so.2
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #8  0x00002aaaaaab8565 in _dl_init_internal () from /lib64/ld-linux-x86-64.so.2
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #9  0x00002aaaaaaabaaa in _dl_start_user () from /lib64/ld-linux-x86-64.so.2
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #10 0x0000000000000001 in ?? ()
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #11 0x00007fffffffe03c in ?? ()
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #12 0x0000000000000000 in ?? ()
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I got the same thing whether I excluded openib or not. I then ran on my Linux cluster, which doesn't have IB at all - and it ran fine. Also runs clean on the Mac. However, in both those cases, I had left IO romio enabled.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Now on odin, I always disable-io-romio. So I tried deliberately enabling it, and everything works. So this appears to be something that the IO work has broken.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Edgar: can you please fix --disable-io-romio?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Thanks
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Ralph
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Oct 29, 2012, at 11:55 AM, Edgar Gabriel &lt;gabriel_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I'm sorry to add one more thing to the list, but beyond this file, it
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; looks like also the entire ompi/mca/common/verbs/ directory is also
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; missing in the 1.7 branch, but is required to compile the bcoll
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; framework.  It is there in the trunk, but missing in the 1.7 branch...
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Thanks
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Edgar
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On 10/26/2012 5:31 PM, Ralph Castain wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Okay, I'll fix for tonights tarball.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Thanks!
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; On Oct 26, 2012, at 3:28 PM, &quot;Shamis, Pavel&quot; &lt;shamisp_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; There is a bug in makefile. The file existing in svn, but it is not listed in the Makefile.am. As a result, it wasn't pulled to the tarball.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Pavel (Pasha) Shamis
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; ---
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Computer Science Research Group
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Computer Science and Math Division
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Oak Ridge National Laboratory
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; On Oct 26, 2012, at 2:33 PM, Edgar Gabriel wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; we have trouble compiling the 1.7 series on a machine in Dresden.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Specifically, we receive an error message when compiling the
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; bcol/iboffload component (other infiniband components compile fine).
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Any idea/suggestions what we might be doing wrong or what to look for?
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; make[2]: Entering directory
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; `/home/h2/gabriel/openmpi-1.7rc4/ompi/mca/bcol/iboffload'
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; CC       bcol_iboffload_module.lo
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; CC       bcol_iboffload_mca.lo
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; CC       bcol_iboffload_endpoint.lo
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; CC       bcol_iboffload_frag.lo
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; In file included from bcol_iboffload_frag.c:16:0:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; bcol_iboffload.h:46:36: fatal error: bcol_iboffload_qp_info.h: No such
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; file or directory
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; compilation terminated.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; make[2]: *** [bcol_iboffload_frag.lo] Error 1
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; make[2]: *** Waiting for unfinished jobs....
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; In file included from bcol_iboffload_mca.c:18:0:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; bcol_iboffload.h:46:36: fatal error: bcol_iboffload_qp_info.h: No such
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; file or directory
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; compilation terminated.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; make[2]: *** [bcol_iboffload_mca.lo] Error 1
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; In file included from bcol_iboffload_endpoint.c:23:0:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; bcol_iboffload.h:46:36: fatal error: bcol_iboffload_qp_info.h: No such
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; file or directory
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; compilation terminated.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; make[2]: *** [bcol_iboffload_endpoint.lo] Error 1
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; In file included from bcol_iboffload_module.c:39:0:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; bcol_iboffload.h:46:36: fatal error: bcol_iboffload_qp_info.h: No such
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; file or directory
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; compilation terminated.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; make[2]: *** [bcol_iboffload_module.lo] Error 1
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; make[2]: Leaving directory
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; `/home/h2/gabriel/openmpi-1.7rc4/ompi/mca/bcol/iboffload'
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; make[1]: *** [all-recursive] Error 1
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; make[1]: Leaving directory `/home/h2/gabriel/openmpi-1.7rc4/ompi'
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; make: *** [all-recursive] Error 1
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Thanks
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Edgar
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Edgar Gabriel
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Associate Professor
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Parallel Software Technologies Lab      <a href="http://pstl.cs.uh.edu">http://pstl.cs.uh.edu</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Department of Computer Science          University of Houston
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Philip G. Hoffman Hall, Room 524        Houston, TX-77204, USA
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; Tel: +1 (713) 743-3857                  Fax: +1 (713) 743-3335
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; &lt;signature.asc&gt;_______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]&lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; -- 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Edgar Gabriel
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Associate Professor
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Parallel Software Technologies Lab      <a href="http://pstl.cs.uh.edu">http://pstl.cs.uh.edu</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Department of Computer Science          University of Houston
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Philip G. Hoffman Hall, Room 524        Houston, TX-77204, USA
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Tel: +1 (713) 743-3857                  Fax: +1 (713) 743-3335
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
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -- 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Edgar Gabriel
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Associate Professor
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Parallel Software Technologies Lab      <a href="http://pstl.cs.uh.edu">http://pstl.cs.uh.edu</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Department of Computer Science          University of Houston
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Philip G. Hoffman Hall, Room 524        Houston, TX-77204, USA
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Tel: +1 (713) 743-3857                  Fax: +1 (713) 743-3335
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
<span class="quotelev1">&gt; 
</span><br>
<p><pre>
-- 
Edgar Gabriel
Associate Professor
Parallel Software Technologies Lab      <a href="http://pstl.cs.uh.edu">http://pstl.cs.uh.edu</a>
Department of Computer Science          University of Houston
Philip G. Hoffman Hall, Room 524        Houston, TX-77204, USA
Tel: +1 (713) 743-3857                  Fax: +1 (713) 743-3335

</pre>
<hr>
<ul>
<li>application/pgp-signature attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-11668/signature.asc">OpenPGP digital signature</a>
</ul>
<!-- attachment="signature.asc" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11669.php">Guillaume.Papaure_at_[hidden]: "[OMPI devel] Linking with slurm pmi when slurm is not in a standard path"</a>
<li><strong>Previous message:</strong> <a href="11667.php">Edgar Gabriel: "Re: [OMPI devel] 1.7 rc4 compilation error"</a>
<li><strong>In reply to:</strong> <a href="11667.php">Edgar Gabriel: "Re: [OMPI devel] 1.7 rc4 compilation error"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11673.php">Ralph Castain: "Re: [OMPI devel] 1.7 rc4 compilation error"</a>
<li><strong>Reply:</strong> <a href="11673.php">Ralph Castain: "Re: [OMPI devel] 1.7 rc4 compilation error"</a>
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
