<?
$subject_val = "[OMPI devel] trunk fails to compile";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Apr 29 01:39:43 2014" -->
<!-- isoreceived="20140429053943" -->
<!-- sent="Tue, 29 Apr 2014 08:39:41 +0300" -->
<!-- isosent="20140429053941" -->
<!-- name="Mike Dubman" -->
<!-- email="miked_at_[hidden]" -->
<!-- subject="[OMPI devel] trunk fails to compile" -->
<!-- id="CAAO1KyaL=2hMq-CnQKFLvtbGh3hbX+hVfrdUd+kGAMWiBbsqAg_at_mail.gmail.com" -->
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
<strong>Subject:</strong> [OMPI devel] trunk fails to compile<br>
<strong>From:</strong> Mike Dubman (<em>miked_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-04-29 01:39:41
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14646.php">Mike Dubman: "Re: [OMPI devel] trunk fails to compile"</a>
<li><strong>Previous message:</strong> <a href="14644.php">Mike Dubman: "Re: [OMPI devel] RFC: Well-known mca parameters"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14646.php">Mike Dubman: "Re: [OMPI devel] trunk fails to compile"</a>
<li><strong>Reply:</strong> <a href="14646.php">Mike Dubman: "Re: [OMPI devel] trunk fails to compile"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
contrib/dist/make_dist_tarball -highok -distdir
<br>
/scrap/jenkins/scrap/workspace/hpc-ompi-shmem/label/hpc-test-node/tarball
<br>
<p><p><p>*03:36:26* make[3]: warning: -jN forced in submake: disabling
<br>
jobserver mode.*03:36:26*   CC       orte-info.o*03:36:26*   CC
<br>
output.o*03:36:26*   CC       param.o*03:36:26*   CC
<br>
components.o*03:36:26*   CC       version.o*03:36:26*   SED
<br>
orte-info.1*03:36:26*
<br>
../../../../orte/tools/orte-info/version.c:27:26: error:
<br>
orte/version.h: No such file or directory*03:36:26* make[3]: ***
<br>
[version.o] Error 1*03:36:26* make[3]: *** Waiting for unfinished
<br>
jobs....*03:36:26* make[3]: Leaving directory
<br>
`/scrap/jenkins/scrap/workspace/hpc-ompi-shmem/label/hpc-test-node/openmpi-1.9a1/_build/orte/tools/orte-info'*03:36:26*
<br>
make[2]: *** [all-recursive] Error 1*03:36:26* make[2]: Leaving
<br>
directory `/scrap/jenkins/scrap/workspace/hpc-ompi-shmem/label/hpc-test-node/openmpi-1.9a1/_build/orte'*03:36:26*
<br>
make[1]: *** [all-recursive] Error 1*03:36:26* make[1]: Leaving
<br>
directory `/scrap/jenkins/scrap/workspace/hpc-ompi-shmem/label/hpc-test-node/openmpi-1.9a1/_build'
<br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-14645/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14646.php">Mike Dubman: "Re: [OMPI devel] trunk fails to compile"</a>
<li><strong>Previous message:</strong> <a href="14644.php">Mike Dubman: "Re: [OMPI devel] RFC: Well-known mca parameters"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14646.php">Mike Dubman: "Re: [OMPI devel] trunk fails to compile"</a>
<li><strong>Reply:</strong> <a href="14646.php">Mike Dubman: "Re: [OMPI devel] trunk fails to compile"</a>
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
