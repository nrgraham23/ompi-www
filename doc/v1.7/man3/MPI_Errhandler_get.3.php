<?php
$topdir = "../../..";
$title = "MPI_Errhandler_get(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_ERRHANDLER_GET(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Errhandler_get </b> - Gets the error handler for a communicator --
use of this routine is deprecated.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Errhandler_get(MPI_Comm comm, MPI_Errhandler *errhandler)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_ERRHANDLER_GET(COMM, ERRHANDLER, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, ERRHANDLER, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameter</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator to get the error handler from (handle).

<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>errhandler </dt>
<dd>MPI error handler currently associated with
communicator (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
Note
that use of this routine is <i>deprecated</i> as of MPI-2. Please use <a href="../man3/MPI_Comm_get_errhandler.3.php">MPI_Comm_get_errhandler</a>
instead.  <p>
This deprecated routine is not available in C++.  <p>
Returns in errhandler
(a handle to) the error handler that is currently associated with communicator
comm. <p>
<b>Example:</b> A library function may register at its entry point the current
error handler for a communicator, set its own private error handler for
this communicator, and restore before exiting the previous error handler.

<p>
<p>
<h2><a name='sect7' href='#toc7'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as
the value of the function and Fortran routines in the last argument. C++
functions do not return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect8' href='#toc8'>See Also</a></h2>
<p>
<a href="../man3/MPI_Comm_create_errhandler.3.php">MPI_Comm_create_errhandler</a> <br>
<a href="../man3/MPI_Comm_get_errhandler.3.php">MPI_Comm_get_errhandler</a> <br>

<p><a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input Parameter</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Errors</a></li>
<li><a name='toc8' href='#sect8'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
