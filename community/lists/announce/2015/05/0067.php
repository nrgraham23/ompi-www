<?
$subject_val = "[Open MPI Announce] OMPI 1.8.5 released";
include("../../include/msg-header.inc");
?>
<!-- received="Tue May  5 16:19:52 2015" -->
<!-- isoreceived="20150505201952" -->
<!-- sent="Tue, 5 May 2015 13:19:48 -0700" -->
<!-- isosent="20150505201948" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="[Open MPI Announce] OMPI 1.8.5 released" -->
<!-- id="8F1A9C7B-257C-45CE-8301-66DDB44608F2_at_open-mpi.org" -->
<!-- charset="us-ascii" -->
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
<strong>Subject:</strong> [Open MPI Announce] OMPI 1.8.5 released<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-05-05 16:19:48
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="http://www.open-mpi.org/community/lists/announce/2015/06/0068.php">Ralph Castain: "[Open MPI Announce] Open MPI 1.8.6 released"</a>
<li><strong>Previous message:</strong> <a href="http://www.open-mpi.org/community/lists/announce/2014/12/0066.php">Ralph Castain: "[Open MPI Announce]  Open MPI 1.8.4 released"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
The Open MPI Team, representing a consortium of research, academic, and industry partners, is pleased to announce the release of Open MPI version 1.8.5.
<br>
<p>v1.8.5 is a bug fix release.  All users are encouraged to upgrade to v1.8.4 when possible. 
<br>
<p>Version 1.8.5 can be downloaded from the main Open MPI web site or any of its mirrors  (mirrors will be updating shortly).
<br>
<p>Here is a list of changes in v1.8.5 as compared to v1.8.4:
<br>
<p>- Fixed configure problems in some cases when using an external hwloc
<br>
&nbsp;&nbsp;installation.  Thanks to Erick Schnetter for reporting the error and
<br>
&nbsp;&nbsp;helping track down the source of the problem.
<br>
- Fixed linker error on OS X when using the clang compiler.  Thanks to
<br>
&nbsp;&nbsp;Erick Schnetter for reporting the error and helping track down the
<br>
&nbsp;&nbsp;source of the problem.
<br>
- Fixed MPI_THREAD_MULTIPLE deadlock error in the vader BTL.  Thanks
<br>
&nbsp;&nbsp;to Thomas Klimpel for reporting the issue.
<br>
- Fixed several Valgrind warnings.  Thanks for Lisandro Dalcin for
<br>
&nbsp;&nbsp;contributing a patch fixing some one-sided code paths.
<br>
- Fixed version compatibility test in OOB that broke ABI within the
<br>
&nbsp;&nbsp;1.8 series. NOTE: this will not resolve the problem between pre-1.8.5
<br>
&nbsp;&nbsp;versions, but will fix it going forward.
<br>
- Fix some issues related to running on Intel Xeon Phi coprocessors.
<br>
- Opportunistically switch away from using GNU Libtool's libltdl
<br>
&nbsp;&nbsp;library when possible (by default).
<br>
- Fix some VampirTrace errors.  Thanks to Paul Hargrove for reporting
<br>
&nbsp;&nbsp;the issues.
<br>
- Correct default binding patterns when --use-hwthread-cpus was
<br>
&nbsp;&nbsp;specified and nprocs &lt;= 2.
<br>
- Fix warnings about -finline-functions when compiling with clang.
<br>
- Updated the embedded hwloc with several bug fixes, including the
<br>
&nbsp;&nbsp;&quot;duplicate Lhwloc1 symbol&quot; that multiple users reported on some
<br>
&nbsp;&nbsp;platforms.
<br>
- Do not error when mpirun is invoked with with default bindings
<br>
&nbsp;&nbsp;(i.e., no binding was specified), and one or more nodes do not
<br>
&nbsp;&nbsp;support bindings.  Thanks to Annu Desari for pointing out the
<br>
&nbsp;&nbsp;problem.
<br>
- Let root invoke &quot;mpirun --version&quot; to check the version without
<br>
&nbsp;&nbsp;printing the &quot;Don't run as root!&quot; warnings.  Thanks to Robert McLay
<br>
&nbsp;&nbsp;for the suggestion.
<br>
- Fixed several bugs in OpenSHMEM support.
<br>
- Extended vader shared memory support to 32-bit architectures.
<br>
- Fix handling of very large datatypes.  Thanks to Bogdan Sataric for
<br>
&nbsp;&nbsp;the bug report.
<br>
- Fixed a bug in handling subarray MPI datatypes, and a bug when using
<br>
&nbsp;&nbsp;MPI_LB and MPI_UB.  Thanks to Gus Correa for pointing out the issue.
<br>
- Restore user-settable bandwidth and latency PML MCA variables.
<br>
- Multiple bug fixes for cleanup during MPI_FINALIZE in unusual
<br>
&nbsp;&nbsp;situations.
<br>
- Added support for TCP keepalive signals to ensure timely termination
<br>
&nbsp;&nbsp;when sockets between daemons cannot be created (e.g., due to a
<br>
&nbsp;&nbsp;firewall).
<br>
- Added MCA parameter to allow full use of a SLURM allocation when
<br>
&nbsp;&nbsp;started from a tool (supports LLNL debugger).
<br>
- Fixed several bugs in the configure logic for PMI and hwloc.
<br>
- Fixed incorrect interface index in TCP communications setup.  Thanks
<br>
&nbsp;&nbsp;to Mark Kettenis for spotting the problem and providing a patch.
<br>
- Fixed MPI_IREDUCE_SCATTER with single-process communicators when
<br>
&nbsp;&nbsp;MPI_IN_PLACE was not used.
<br>
- Added XRC support for OFED v3.12 and higher.
<br>
- Various updates and bug fixes to the Mellanox hcoll collective
<br>
&nbsp;&nbsp;support.
<br>
- Fix problems with Fortran compilers that did not support
<br>
&nbsp;&nbsp;REAL*16/COMPLEX*32 types.  Thanks to Orion Poplawski for identifying
<br>
&nbsp;&nbsp;the issue.
<br>
- Fixed problem with rpath/runpath support in pkg-config files.
<br>
&nbsp;&nbsp;Thanks to Christoph Junghans for notifying us of the issue.
<br>
- Man page fixes:
<br>
&nbsp;&nbsp;- Removed erroneous &quot;color&quot; discussion from MPI_COMM_SPLIT_TYPE.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;Thanks to Erick Schnetter for spotting the outdated text.
<br>
&nbsp;&nbsp;- Fixed prototypes for MPI_IBARRIER.  Thanks to Maximilian for
<br>
&nbsp;&nbsp;&nbsp;&nbsp;finding the issue.
<br>
&nbsp;&nbsp;- Updated docs about buffer usage in non-blocking communications.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;Thanks to Alexander Pozdneev for citing the outdated text.
<br>
&nbsp;&nbsp;- Added documentation about the 'ompi_unique' MPI_Info key with
<br>
&nbsp;&nbsp;&nbsp;&nbsp;MPI_PUBLISH_NAME.
<br>
&nbsp;&nbsp;- Fixed typo in MPI_INTERCOMM_MERGE.  Thanks to Harald Servat for
<br>
&nbsp;&nbsp;&nbsp;&nbsp;noticing and sending a patch.
<br>
&nbsp;&nbsp;- Updated configure paths in HACKING.  Thanks to Maximilien Levesque
<br>
&nbsp;&nbsp;&nbsp;&nbsp;for the fix.
<br>
&nbsp;&nbsp;- Fixed Fortran typo in MPI_WIN_LOCK_ALL.  Thanks to Thomas Jahns
<br>
&nbsp;&nbsp;&nbsp;&nbsp;for pointing out the issue.
<br>
- Fixed a number of MPI one-sided bugs.
<br>
- Fixed MPI_COMM_SPAWN when invoked from a singleton job.
<br>
- Fixed a number of minor issues with CUDA support, including
<br>
&nbsp;&nbsp;registering of shared memory and supporting reduction support for
<br>
&nbsp;&nbsp;GPU buffers.
<br>
- Improved support for building OMPI on Cray platforms.
<br>
- Fixed performance regression introduced by the inadvertent default
<br>
&nbsp;&nbsp;enabling of MPI_THREAD_MULTIPLE support.
<br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="http://www.open-mpi.org/community/lists/announce/2015/06/0068.php">Ralph Castain: "[Open MPI Announce] Open MPI 1.8.6 released"</a>
<li><strong>Previous message:</strong> <a href="http://www.open-mpi.org/community/lists/announce/2014/12/0066.php">Ralph Castain: "[Open MPI Announce]  Open MPI 1.8.4 released"</a>
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
