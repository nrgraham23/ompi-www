<?php
$topdir = "../../..";
$title = "MPI_Win_call_errhandler(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_WIN_CALL_ERRHANDLER(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<p>
<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Win_call_errhandler</b> - Passes the supplied error code to the

<p>error handler assigned to a window
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<p>
<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Win_call_errhandler(MPI_Win win, int errorcode)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_WIN_CALL_ERRHANDLER(WIN, ERRORCODE, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;WIN, ERRORCODE, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Win::Call_errhandler(int errorcode) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>win </dt>
<dd>Window with error handler (handle). </dd>

<dt>errorcode </dt>
<dd>MPI error
code (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
This function invokes the error handler assigned to the window
<i>win</i> with the supplied error code <i>errorcode</i>. If the error handler was successfully
called, the process is not aborted, and the error handler returns, this
function returns MPI_SUCCESS.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
Users should note that the default error
handler is MPI_ERRORS_ARE_FATAL. Thus, calling this function will abort
the window processes if the default error handler has not been changed
for this window.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value; C
routines as the value of the function and Fortran routines in the last
argument. C++ functions do not return errors. If the default error handler
is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception
mechanism will be used to throw an MPI::Exception object. <p>
See the MPI man
page for a full list of MPI error codes.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Win_create_errhandler.3.php">MPI_Win_create_errhandler</a>
<a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
