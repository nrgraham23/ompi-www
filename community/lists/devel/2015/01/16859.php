<?
$subject_val = "Re: [OMPI devel] RFC: Remove embedded libltdl";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Jan 30 19:46:19 2015" -->
<!-- isoreceived="20150131004619" -->
<!-- sent="Fri, 30 Jan 2015 16:46:17 -0800" -->
<!-- isosent="20150131004617" -->
<!-- name="Paul Hargrove" -->
<!-- email="phhargrove_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: Remove embedded libltdl" -->
<!-- id="CAAvDA14WtOWmW3-RfDjv3b-iJFtRDhx138r7mFO3d8mkWCKpFA_at_mail.gmail.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="6E8E54CC-0A35-42A6-9B64-5AEDFC56AD60_at_cisco.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: Remove embedded libltdl<br>
<strong>From:</strong> Paul Hargrove (<em>phhargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-01-30 19:46:17
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16860.php">Bert Wesarg: "[OMPI devel] help-oshmem-shmem.txt still missing in v1.8"</a>
<li><strong>Previous message:</strong> <a href="16858.php">Paul Hargrove: "Re: [OMPI devel] RFC: Remove embedded libltdl"</a>
<li><strong>In reply to:</strong> <a href="16857.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] RFC: Remove embedded libltdl"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16865.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] RFC: Remove embedded libltdl"</a>
<li><strong>Reply:</strong> <a href="16865.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] RFC: Remove embedded libltdl"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Observed failure mode 2-of-2:
<br>
<p>On at least one SLES-11.1 system you are attempting to link libltdl.so by
<br>
full path and are erroneously using /usr/lib/libltdl.so instead of
<br>
/usr/lib64/libltdl.so, resulting in the failure below.
<br>
<p>-Paul
<br>
<p>libtool: link: pgcc -shared  -fpic -DPIC  class/.libs/opal_bitmap.o
<br>
class/.libs/opal_free_list.o class/.libs/opal_hash_table.o
<br>
class/.libs/opal_hotel.o class/.libs/opal_tree.o class/.libs/opal_list.o
<br>
class/.libs/opal_object.o class/.libs/opal_graph.o class/.libs/opal_lifo.o
<br>
class/.libs/opal_fifo.o class/.libs/opal_pointer_array.o
<br>
class/.libs/opal_value_array.o class/.libs/opal_ring_buffer.o
<br>
class/.libs/opal_rb_tree.o class/.libs/ompi_free_list.o
<br>
memoryhooks/.libs/memory.o runtime/.libs/opal_progress.o
<br>
runtime/.libs/opal_finalize.o runtime/.libs/opal_init.o
<br>
runtime/.libs/opal_params.o runtime/.libs/opal_cr.o
<br>
runtime/.libs/opal_info_support.o runtime/.libs/opal_progress_threads.o
<br>
threads/.libs/condition.o threads/.libs/mutex.o threads/.libs/thread.o
<br>
dss/.libs/dss_internal_functions.o dss/.libs/dss_compare.o
<br>
dss/.libs/dss_copy.o dss/.libs/dss_dump.o dss/.libs/dss_load_unload.o
<br>
dss/.libs/dss_lookup.o dss/.libs/dss_pack.o dss/.libs/dss_peek.o
<br>
dss/.libs/dss_print.o dss/.libs/dss_register.o dss/.libs/dss_unpack.o
<br>
dss/.libs/dss_open_close.o
<br>
&nbsp;-Wl,--whole-archive,asm/.libs/libasm.a,datatype/.libs/libdatatype.a,mca/base/.libs/libmca_base.a,util/.libs/libopalutil.a,mca/allocator/.libs/libmca_allocator.a,mca/backtrace/.libs/libmca_backtrace.a,mca/backtrace/execinfo/.libs/libmca_backtrace_execinfo.a,mca/btl/.libs/libmca_btl.a,mca/compress/.libs/libmca_compress.a,mca/crs/.libs/libmca_crs.a,mca/dstore/.libs/libmca_dstore.a,mca/event/.libs/libmca_event.a,mca/event/libevent2022/.libs/libmca_event_libevent2022.a,mca/hwloc/.libs/libmca_hwloc.a,mca/hwloc/hwloc191/.libs/libmca_hwloc_hwloc191.a,mca/if/.libs/libmca_if.a,mca/if/posix_ipv4/.libs/libmca_if_posix_ipv4.a,mca/if/linux_ipv6/.libs/libmca_if_linux_ipv6.a,mca/installdirs/.libs/libmca_installdirs.a,mca/installdirs/config/.libs/libmca_installdirs_config.a,mca/installdirs/env/.libs/libmca_installdirs_env.a,mca/memchecker/.libs/libmca_memchecker.a,mca/memcpy/.libs/libmca_memcpy.a,mca/memory/.libs/libmca_memory.a,mca/memory/linux/.libs/libmca_memory_linux.a,mca/mpool/.libs/libmca_mpool.a,mca/pmix/.libs/libmca_pmix.a,mca/pstat/.libs/libmca_pstat.a,mca/rcache/.libs/libmca_rcache.a,mca/sec/.libs/libmca_sec.a,mca/shmem/.libs/libmca_shmem.a,mca/timer/.libs/libmca_timer.a,mca/timer/linux/.libs/libmca_timer_linux.a
<br>
-Wl,--no-whole-archive  -lm -lpciaccess -lrt -lutil /usr/lib/libltdl.so
<br>
-ldl -lc    -Wl,-soname -Wl,libopen-pal.so.0 -o .libs/libopen-pal.so.0.0.0
<br>
/usr/lib/libltdl.so: could not read symbols: File in wrong format
<br>
<p>On Fri, Jan 30, 2015 at 3:51 PM, Jeff Squyres (jsquyres) &lt;jsquyres_at_[hidden]
<br>
<span class="quotelev1">&gt; wrote:
</span><br>
<p><span class="quotelev1">&gt; New tarball posted (same location).  Now featuring 100% fewer &quot;make check&quot;
</span><br>
<span class="quotelev1">&gt; failures.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;     <a href="http://www.open-mpi.org/~jsquyres/unofficial/">http://www.open-mpi.org/~jsquyres/unofficial/</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt; &gt; On Jan 30, 2015, at 5:14 PM, Jeff Squyres (jsquyres) &lt;jsquyres_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; wrote:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Shame on me for not running &quot;make check&quot;.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Fixing...
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; On Jan 30, 2015, at 4:58 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Jeff,
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; I ran on just one (mac OSX 10.8) system first as a &quot;smoke test&quot;.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; It encountered the failure show below on &quot;make check&quot; at which point I
</span><br>
<span class="quotelev1">&gt; decided not to test 60+ platforms.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Please advise how I should proceed (best guess is wait for a new
</span><br>
<span class="quotelev1">&gt; tarball).
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; -Paul
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Making check in test
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Making check in support
</span><br>
<span class="quotelev3">&gt; &gt;&gt; make  libsupport.a
</span><br>
<span class="quotelev3">&gt; &gt;&gt;  CC       components.o
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt; /Users/Paul/OMPI/openmpi-libltdl-macos10.8-x86-clang/openmpi-gitclone/test/support/components.c:27:10:
</span><br>
<span class="quotelev1">&gt; fatal error: 'opal/libltdl/ltdl.h' file not found
</span><br>
<span class="quotelev3">&gt; &gt;&gt; #include &quot;opal/libltdl/ltdl.h&quot;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;         ^
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; On Fri, Jan 30, 2015 at 1:29 PM, Jeff Squyres (jsquyres) &lt;
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; On Jan 30, 2015, at 2:46 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; If I had new enough autotools to autogen on this old system then I
</span><br>
<span class="quotelev1">&gt; wouldn't have asked about libltdl from libtool-1.4.  So, please *do*
</span><br>
<span class="quotelev1">&gt; generate a tarball and I will test (on *all* of my systems).
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Sweet, thank you.  I just posted a tarball here:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;    <a href="http://www.open-mpi.org/~jsquyres/unofficial/">http://www.open-mpi.org/~jsquyres/unofficial/</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev3">&gt; &gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
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
<span class="quotelev3">&gt; &gt;&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/01/16854.php">http://www.open-mpi.org/community/lists/devel/2015/01/16854.php</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev3">&gt; &gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/01/16855.php">http://www.open-mpi.org/community/lists/devel/2015/01/16855.php</a>
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; --
</span><br>
<span class="quotelev2">&gt; &gt; Jeff Squyres
</span><br>
<span class="quotelev2">&gt; &gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev2">&gt; &gt;
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
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/01/16856.php">http://www.open-mpi.org/community/lists/devel/2015/01/16856.php</a>
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
<span class="quotelev1">&gt; For corporate legal information go to:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
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
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/01/16857.php">http://www.open-mpi.org/community/lists/devel/2015/01/16857.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><p><p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Computer Languages &amp; Systems Software (CLaSS) Group
Computer Science Department               Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-16859/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="16860.php">Bert Wesarg: "[OMPI devel] help-oshmem-shmem.txt still missing in v1.8"</a>
<li><strong>Previous message:</strong> <a href="16858.php">Paul Hargrove: "Re: [OMPI devel] RFC: Remove embedded libltdl"</a>
<li><strong>In reply to:</strong> <a href="16857.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] RFC: Remove embedded libltdl"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="16865.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] RFC: Remove embedded libltdl"</a>
<li><strong>Reply:</strong> <a href="16865.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] RFC: Remove embedded libltdl"</a>
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
