<?
$subject_val = "Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &quot;gcc -m32&quot; (hwloc)";
include("../../include/msg-header.inc");
?>
<!-- received="Tue May  3 02:22:36 2016" -->
<!-- isoreceived="20160503062236" -->
<!-- sent="Tue, 3 May 2016 08:22:32 +0200" -->
<!-- isosent="20160503062232" -->
<!-- name="Brice Goglin" -->
<!-- email="Brice.Goglin_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &amp;quot;gcc -m32&amp;quot; (hwloc)" -->
<!-- id="572843A8.5060803_at_inria.fr" -->
<!-- charset="windows-1252" -->
<!-- inreplyto="CAAvDA14-H5mFrSK=OhJ0QM3R11WGNwH+=RvcuAVEHO0-xskJRw_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &quot;gcc -m32&quot; (hwloc)<br>
<strong>From:</strong> Brice Goglin (<em>Brice.Goglin_at_[hidden]</em>)<br>
<strong>Date:</strong> 2016-05-03 02:22:32
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18895.php">Paul Hargrove: "[OMPI devel] [2.0.0rc2] ICE with ekopath-5 and 6"</a>
<li><strong>Previous message:</strong> <a href="18893.php">Paul Hargrove: "Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &quot;gcc -m32&quot; (hwloc)"</a>
<li><strong>In reply to:</strong> <a href="18893.php">Paul Hargrove: "Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &quot;gcc -m32&quot; (hwloc)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="18898.php">Brice Goglin: "Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &quot;gcc -m32&quot; (hwloc)"</a>
<li><strong>Reply:</strong> <a href="18898.php">Brice Goglin: "Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &quot;gcc -m32&quot; (hwloc)"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Yes we should backport this to OMPI master and v2.x.
<br>
I am usually not the one doing the PR, I'd need to learn the exact
<br>
procedure first :)
<br>
<p>Brice
<br>
<p><p><p>Le 03/05/2016 08:15, Paul Hargrove a &#233;crit :
<br>
<span class="quotelev1">&gt; Thanks, Brice.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Any plans to get this fix into Open MPI's embedded copy of hwloc
</span><br>
<span class="quotelev1">&gt; 1.11.2, and into v2.x in particular?
</span><br>
<span class="quotelev1">&gt; Or perhaps that is Jeff's job?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Mon, May 2, 2016 at 11:04 PM, Brice Goglin &lt;Brice.Goglin_at_[hidden]
</span><br>
<span class="quotelev1">&gt; &lt;mailto:Brice.Goglin_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;     Should be fixed by
</span><br>
<span class="quotelev1">&gt;     <a href="https://github.com/open-mpi/hwloc/commit/9549fd59af04dca2e2340e17f0e685f8c552d818">https://github.com/open-mpi/hwloc/commit/9549fd59af04dca2e2340e17f0e685f8c552d818</a>
</span><br>
<span class="quotelev1">&gt;     Thanks for the report
</span><br>
<span class="quotelev1">&gt;     Brice
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;     Le 02/05/2016 21:53, Paul Hargrove a &#233;crit :
</span><br>
<span class="quotelev2">&gt;&gt;     I have a linux/ppc64 host running Fedora 20.
</span><br>
<span class="quotelev2">&gt;&gt;     I have configured the 2.0.0rc2 tarball with
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;         --prefix=[....] --enable-debug \
</span><br>
<span class="quotelev2">&gt;&gt;         CFLAGS=-m32 --with-wrapper-cflags=-m32 \
</span><br>
<span class="quotelev2">&gt;&gt;         CXXFLAGS=-m32 --with-wrapper-cxxflags=-m32 \
</span><br>
<span class="quotelev2">&gt;&gt;         FCFLAGS=-m32 --with-wrapper-fcflags=-m32 --disable-mpi-fortran
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     [yes, I know the fortran flags are pointless with
</span><br>
<span class="quotelev2">&gt;&gt;     --disable-mpi-fortran]
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     My build is failing (as shown at the bottom of this email) in
</span><br>
<span class="quotelev2">&gt;&gt;     tools/wrappers with undefined references to udev symbols.
</span><br>
<span class="quotelev2">&gt;&gt;     The udev configure probe run by the embedded hwloc seemed happy
</span><br>
<span class="quotelev2">&gt;&gt;     enough:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;         --- MCA component hwloc:hwloc1112 (m4 configuration macro,
</span><br>
<span class="quotelev2">&gt;&gt;         priority 90)
</span><br>
<span class="quotelev2">&gt;&gt;         checking for MCA component hwloc:hwloc1112 compile mode... static
</span><br>
<span class="quotelev2">&gt;&gt;         checking hwloc building mode... embedded
</span><br>
<span class="quotelev2">&gt;&gt;         [...]
</span><br>
<span class="quotelev2">&gt;&gt;         checking libudev.h usability... yes
</span><br>
<span class="quotelev2">&gt;&gt;         checking libudev.h presence... yes
</span><br>
<span class="quotelev2">&gt;&gt;         checking for libudev.h... yes
</span><br>
<span class="quotelev2">&gt;&gt;         checking for udev_device_new_from_subsystem_sysname in
</span><br>
<span class="quotelev2">&gt;&gt;         -ludev... no
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     However, looking at config.log one can see that despite the
</span><br>
<span class="quotelev2">&gt;&gt;     presence/usability of libudev.h there is NOT a libudev library
</span><br>
<span class="quotelev2">&gt;&gt;     present for &quot;-m32&quot;.
</span><br>
<span class="quotelev2">&gt;&gt;     This is apparent because the probe
</span><br>
<span class="quotelev2">&gt;&gt;     for udev_device_new_from_subsystem_sysname failed with a message
</span><br>
<span class="quotelev2">&gt;&gt;     about the *library* not being found rather than about an
</span><br>
<span class="quotelev2">&gt;&gt;     undefined symbol.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     I *can* work-around this issue by passing  --disable-libudev to
</span><br>
<span class="quotelev2">&gt;&gt;     configure.
</span><br>
<span class="quotelev2">&gt;&gt;     However, it would seem appropriate to check for a usable libudev
</span><br>
<span class="quotelev2">&gt;&gt;     library in addition to the header.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     -Paul
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     Making all in tools/wrappers
</span><br>
<span class="quotelev2">&gt;&gt;     make[2]: Entering directory
</span><br>
<span class="quotelev2">&gt;&gt;     `/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/BLD/opal/tools/wrappers'
</span><br>
<span class="quotelev2">&gt;&gt;     depbase=`echo opal_wrapper.o | sed 's|[^/]*$|.deps/&amp;|;s|\.o$||'`;\
</span><br>
<span class="quotelev2">&gt;&gt;     gcc -std=gnu99 &quot;-DEXEEXT=\&quot;\&quot;&quot; -I.
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/openmpi-2.0.0rc2/opal/tools/wrappers
</span><br>
<span class="quotelev2">&gt;&gt;     -I../../../opal/include -I../../../ompi/include
</span><br>
<span class="quotelev2">&gt;&gt;     -I../../../oshmem/include
</span><br>
<span class="quotelev2">&gt;&gt;     -I../../../opal/mca/hwloc/hwloc1112/hwloc/include/private/autogen
</span><br>
<span class="quotelev2">&gt;&gt;     -I../../../opal/mca/hwloc/hwloc1112/hwloc/include/hwloc/autogen
</span><br>
<span class="quotelev2">&gt;&gt;     -I../../../ompi/mpiext/cuda/c  
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/openmpi-2.0.0rc2
</span><br>
<span class="quotelev2">&gt;&gt;     -I../../..
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/openmpi-2.0.0rc2/opal/include
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/openmpi-2.0.0rc2/orte/include
</span><br>
<span class="quotelev2">&gt;&gt;     -I../../../orte/include
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/openmpi-2.0.0rc2/ompi/include
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/openmpi-2.0.0rc2/oshmem/include
</span><br>
<span class="quotelev2">&gt;&gt;      
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/openmpi-2.0.0rc2/opal/mca/hwloc/hwloc1112/hwloc/include
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/BLD/opal/mca/hwloc/hwloc1112/hwloc/include
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/openmpi-2.0.0rc2/opal/mca/event/libevent2022/libevent
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/openmpi-2.0.0rc2/opal/mca/event/libevent2022/libevent/include
</span><br>
<span class="quotelev2">&gt;&gt;     -I/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/BLD/opal/mca/event/libevent2022/libevent/include
</span><br>
<span class="quotelev2">&gt;&gt;      -m32 -g -finline-functions -fno-strict-aliasing -pthread -MT
</span><br>
<span class="quotelev2">&gt;&gt;     opal_wrapper.o -MD -MP -MF $depbase.Tpo -c -o opal_wrapper.o
</span><br>
<span class="quotelev2">&gt;&gt;     /home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/openmpi-2.0.0rc2/opal/tools/wrappers/opal_wrapper.c
</span><br>
<span class="quotelev2">&gt;&gt;     &amp;&amp;\
</span><br>
<span class="quotelev2">&gt;&gt;     mv -f $depbase.Tpo $depbase.Po
</span><br>
<span class="quotelev2">&gt;&gt;     /bin/sh ../../../libtool  --tag=CC   --mode=link gcc -std=gnu99
</span><br>
<span class="quotelev2">&gt;&gt;      -m32 -g -finline-functions -fno-strict-aliasing -pthread   -o
</span><br>
<span class="quotelev2">&gt;&gt;     opal_wrapper opal_wrapper.o ../../../opal/libopen-pal.la
</span><br>
<span class="quotelev2">&gt;&gt;     &lt;<a href="http://libopen-pal.la">http://libopen-pal.la</a>&gt; -lrt -lm -lutil
</span><br>
<span class="quotelev2">&gt;&gt;     libtool: link: gcc -std=gnu99 -m32 -g -finline-functions
</span><br>
<span class="quotelev2">&gt;&gt;     -fno-strict-aliasing -pthread -o .libs/opal_wrapper
</span><br>
<span class="quotelev2">&gt;&gt;     opal_wrapper.o  ../../../opal/.libs/libopen-pal.so -ldl -lrt -lm
</span><br>
<span class="quotelev2">&gt;&gt;     -lutil -pthread -Wl,-rpath
</span><br>
<span class="quotelev2">&gt;&gt;     -Wl,/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/INST/lib
</span><br>
<span class="quotelev2">&gt;&gt;     ../../../opal/.libs/libopen-pal.so: undefined reference to `udev_new'
</span><br>
<span class="quotelev2">&gt;&gt;     ../../../opal/.libs/libopen-pal.so: undefined reference to
</span><br>
<span class="quotelev2">&gt;&gt;     `udev_device_new_from_subsystem_sysname'
</span><br>
<span class="quotelev2">&gt;&gt;     ../../../opal/.libs/libopen-pal.so: undefined reference to
</span><br>
<span class="quotelev2">&gt;&gt;     `udev_unref'
</span><br>
<span class="quotelev2">&gt;&gt;     ../../../opal/.libs/libopen-pal.so: undefined reference to
</span><br>
<span class="quotelev2">&gt;&gt;     `udev_device_get_property_value'
</span><br>
<span class="quotelev2">&gt;&gt;     ../../../opal/.libs/libopen-pal.so: undefined reference to
</span><br>
<span class="quotelev2">&gt;&gt;     `udev_device_unref'
</span><br>
<span class="quotelev2">&gt;&gt;     collect2: error: ld returned 1 exit status
</span><br>
<span class="quotelev2">&gt;&gt;     make[2]: *** [opal_wrapper] Error 1
</span><br>
<span class="quotelev2">&gt;&gt;     make[2]: Leaving directory
</span><br>
<span class="quotelev2">&gt;&gt;     `/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/BLD/opal/tools/wrappers'
</span><br>
<span class="quotelev2">&gt;&gt;     make[1]: *** [all-recursive] Error 1
</span><br>
<span class="quotelev2">&gt;&gt;     make[1]: Leaving directory
</span><br>
<span class="quotelev2">&gt;&gt;     `/home/phargrov/OMPI/openmpi-2.0.0rc2-linux-ppc32-gcc/BLD/opal'
</span><br>
<span class="quotelev2">&gt;&gt;     make: *** [all-recursive] Error 1
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     -- 
</span><br>
<span class="quotelev2">&gt;&gt;     Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;     &lt;mailto:PHHargrove_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev2">&gt;&gt;     Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev2">&gt;&gt;     &lt;tel:%2B1-510-495-2352&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev2">&gt;&gt;     &lt;tel:%2B1-510-486-6900&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;     devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt;     devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt;     Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;     Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2016/05/18869.php">http://www.open-mpi.org/community/lists/devel/2016/05/18869.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;     _______________________________________________
</span><br>
<span class="quotelev1">&gt;     devel mailing list
</span><br>
<span class="quotelev1">&gt;     devel_at_[hidden] &lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt;     Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;     Link to this post:
</span><br>
<span class="quotelev1">&gt;     <a href="http://www.open-mpi.org/community/lists/devel/2016/05/18892.php">http://www.open-mpi.org/community/lists/devel/2016/05/18892.php</a>
</span><br>
<span class="quotelev1">&gt;
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
<span class="quotelev1">&gt; &lt;mailto:PHHargrove_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev1">&gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
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
<span class="quotelev1">&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2016/05/18893.php">http://www.open-mpi.org/community/lists/devel/2016/05/18893.php</a>
</span><br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-18894/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18895.php">Paul Hargrove: "[OMPI devel] [2.0.0rc2] ICE with ekopath-5 and 6"</a>
<li><strong>Previous message:</strong> <a href="18893.php">Paul Hargrove: "Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &quot;gcc -m32&quot; (hwloc)"</a>
<li><strong>In reply to:</strong> <a href="18893.php">Paul Hargrove: "Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &quot;gcc -m32&quot; (hwloc)"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="18898.php">Brice Goglin: "Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &quot;gcc -m32&quot; (hwloc)"</a>
<li><strong>Reply:</strong> <a href="18898.php">Brice Goglin: "Re: [OMPI devel] [2.0.0rc2] build failure with ppc64 and &quot;gcc -m32&quot; (hwloc)"</a>
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
