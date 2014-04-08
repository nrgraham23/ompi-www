<?php
$topdir = "../../..";
$title = "MPI_Barrier(3) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: MPI_BARRIER(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Barrier</b> - Blocks until all processes have reached this routine.

<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Barrier(MPI_Comm comm)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_BARRIER(COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>import mpi.*;
void MPI.COMM_WORLD.Barrier()
</pre>
<h2><a name='sect5' href='#toc5'>Java Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Comm::Barrier() const = 0
</pre>
<h2><a name='sect6' href='#toc6'>Input Parameter</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran
only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect8' href='#toc8'>Description</a></h2>
Blocks the caller until all group
members have called it; the call returns at any process only after all
group members have entered the call.
<p>
<h2><a name='sect9' href='#toc9'>When Communicator is an Inter-communicator</a></h2>
<p>
When
the communicator is an inter-communicator, the barrier operation is performed
across all processes in both groups.  All processes in the first group may
exit the barrier when all processes in the second group have entered the
barrier.
<p>
<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost all MPI routines return an error value; C routines
as the value of the function and Fortran routines in the last argument.
C++ functions do not return errors. If the default error handler is set
to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
will be used to throw an MPI::Exception object. <p>
Before the error value is
returned, the current MPI error handler is called. By default, this error
handler aborts the MPI job, except for I/O function errors. The error handler
may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.

<p>
<h2><a name='sect11' href='#toc11'>See Also</a></h2>
<a href="../man3/MPI_Bcast.3.php">MPI_Bcast</a> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Java Syntax</a></li>
<li><a name='toc6' href='#sect6'>Input Parameter</a></li>
<li><a name='toc7' href='#sect7'>Output Parameter</a></li>
<li><a name='toc8' href='#sect8'>Description</a></li>
<li><a name='toc9' href='#sect9'>When Communicator is an Inter-communicator</a></li>
<li><a name='toc10' href='#sect10'>Errors</a></li>
<li><a name='toc11' href='#sect11'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
