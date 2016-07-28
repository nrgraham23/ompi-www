<?
$subject_val = "[OMPI devel] 1.5rc5 warnings from gcc on OpenSolaris";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Aug 24 21:01:07 2010" -->
<!-- isoreceived="20100825010107" -->
<!-- sent="Tue, 24 Aug 2010 18:00:50 -0700" -->
<!-- isosent="20100825010050" -->
<!-- name="Paul H. Hargrove" -->
<!-- email="PHHargrove_at_[hidden]" -->
<!-- subject="[OMPI devel] 1.5rc5 warnings from gcc on OpenSolaris" -->
<!-- id="4C746B42.6010709_at_lbl.gov" -->
<!-- charset="ISO-8859-1" -->
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
<strong>Subject:</strong> [OMPI devel] 1.5rc5 warnings from gcc on OpenSolaris<br>
<strong>From:</strong> Paul H. Hargrove (<em>PHHargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2010-08-24 21:00:50
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8327.php">George Bosilca: "Re: [OMPI devel] 1.4.3rc1 out"</a>
<li><strong>Previous message:</strong> <a href="8325.php">Jeff Squyres: "Re: [OMPI devel] 1.5rc5 build failure with icc-11.1"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8330.php">George Bosilca: "Re: [OMPI devel] 1.5rc5 warnings from gcc on OpenSolaris"</a>
<li><strong>Reply:</strong> <a href="8330.php">George Bosilca: "Re: [OMPI devel] 1.5rc5 warnings from gcc on OpenSolaris"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
A build of 1.5rc5 with gcc on OpenSolaris/x86 agrees with my Sun C build 
<br>
(<a href="http://www.open-mpi.org/community/lists/devel/2010/08/8323.php">http://www.open-mpi.org/community/lists/devel/2010/08/8323.php</a>) about 
<br>
type sloppiness in common_sm_mmap.c.
<br>
<p>$ uname -a
<br>
SunOS osol-x64 5.11 snv_111b i86pc i386 i86pc
<br>
<p>$ gcc --version
<br>
gcc (GCC) 3.4.3 (csl-sol210-3_4-20050802)
<br>
Copyright (C) 2004 Free Software Foundation, Inc.
<br>
This is free software; see the source for copying conditions.  There is NO
<br>
warranty; not even for MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
<br>
<p>$ [path_to]/openmpi-1.5rc5/configure
<br>
[...]
<br>
<p>$ make
<br>
[...]
<br>
../../../../../openmpi-1.5rc5/ompi/mca/common/sm/common_sm_mmap.c:201: 
<br>
warning: assignment from incompatible pointer type
<br>
../../../../../openmpi-1.5rc5/ompi/mca/common/sm/common_sm_mmap.c:207: 
<br>
warning: assignment from incompatible pointer type
<br>
../../../../../openmpi-1.5rc5/ompi/mca/common/sm/common_sm_mmap.c:280: 
<br>
warning: passing arg 1 of `munmap' from incompatible pointer type
<br>
[...]
<br>
<p>Those are the only warnings generated by this build.
<br>
<p>-Paul
<br>
<p><p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Future Technologies Group
HPC Research Department                   Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="8327.php">George Bosilca: "Re: [OMPI devel] 1.4.3rc1 out"</a>
<li><strong>Previous message:</strong> <a href="8325.php">Jeff Squyres: "Re: [OMPI devel] 1.5rc5 build failure with icc-11.1"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="8330.php">George Bosilca: "Re: [OMPI devel] 1.5rc5 warnings from gcc on OpenSolaris"</a>
<li><strong>Reply:</strong> <a href="8330.php">George Bosilca: "Re: [OMPI devel] 1.5rc5 warnings from gcc on OpenSolaris"</a>
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
