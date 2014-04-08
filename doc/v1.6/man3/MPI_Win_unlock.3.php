<?php
$topdir = "../../..";
$title = "MPI_Win_unlock(3) man page (version 1.6.4)";
$meta_desc = "Open MPI v1.6.4 man page: MPI_WIN_UNLOCK(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Win_unlock</b> - Completes an RMA access epoch started by a call to
<a href="../man3/MPI_Win_lock.3.php">MPI_Win_lock</a>.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Win_unlock(int rank, MPI_Win win)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_WIN_UNLOCK(RANK, WIN, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER RANK, WIN, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Win::Unlock(int rank) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>rank </dt>
<dd>Rank of window (nonnegative integer).  </dd>

<dt>win </dt>
<dd>Window object
(handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Win_unlock completes an RMA access epoch started by a
call to <a href="../man3/MPI_Win_lock.3.php">MPI_Win_lock</a>. RMA operations issued during this period will have
completed both at the origin and at the target when the call returns.  <p>
Locks
are used to protect accesses to the locked target window effected by RMA
calls issued between the lock and unlock call, and to protect local load/store
accesses to a locked local window executed between the lock and unlock
call. Accesses that are protected by an exclusive lock will not be concurrent
at the window site with other accesses to the same window that are lock
protected. Accesses that are protected by a shared lock will not be concurrent
at the window site with accesses protected by an exclusive lock to the
same window.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value; C routines
as the value of the function and Fortran routines in the last argument.
C++ functions do not return errors. If the default error handler is set
to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
will be used to throw an MPI:Exception object. <p>
Before the error value is
returned, the current MPI error handler is called. By default, this error
handler aborts the MPI job, except for I/O function errors. The error handler
may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.

<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<a href="../man3/MPI_Win_lock.3.php">MPI_Win_lock</a> <br>

<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameter</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
