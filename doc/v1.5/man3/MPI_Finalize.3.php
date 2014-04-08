<?php
$topdir = "../../..";
$title = "MPI_Finalize(3) man page (version 1.5.5)";
$meta_desc = "Open MPI v1.5.5 man page: MPI_FINALIZE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Finalize </b> - Terminates MPI execution environment.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Finalize()
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_FINALIZE(IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Finalize()
</pre>
<h2><a name='sect5' href='#toc5'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
This
routine cleans up all MPI states. Once this routine is called, no MPI routine
(not even <a href="../man3/MPI_Init.3.php">MPI_Init</a>) may be called, except for <a href="../man3/MPI_Get_version.3.php">MPI_Get_version</a>, <a href="../man3/MPI_Initialized.3.php">MPI_Initialized</a>,
and <a href="../man3/MPI_Finalized.3.php">MPI_Finalized</a>. Unless there has been a call to <a href="../man3/MPI_Abort.3.php">MPI_Abort</a>, you must ensure
that all pending communications involving a process are complete before
the process calls MPI_Finalize. If the call returns, each process may either
continue local computations or exit without participating in further communication
with other processes. At the moment when the last process calls MPI_Finalize,
all pending sends must be matched by a receive, and all pending receives
must be matched by a send.
<p> MPI_Finalize is collective over all connected
processes. If no processes were spawned, accepted, or connected, then this
means it is collective over MPI_COMM_WORLD. Otherwise, it is collective
over the union of all processes that have been and continue to be connected.

<p>
<h2><a name='sect7' href='#toc7'>Notes</a></h2>
All processes must call this routine before exiting. All processes
will still exist but may not make any further MPI calls. MPI_Finalize guarantees
that all local actions required by communications the user has completed
will, in fact, occur before it returns. However, MPI_Finalize guarantees
nothing about pending communications that have <i>not</i> been completed; completion
is ensured only by <a href="../man3/MPI_Wait.3.php">MPI_Wait</a>, <a href="../man3/MPI_Test.3.php">MPI_Test</a>, or <a href="../man3/MPI_Request_free.3.php">MPI_Request_free</a> combined with
some other verification of completion. <p>
For example, a successful return
from a blocking communication operation or from <a href="../man3/MPI_Wait.3.php">MPI_Wait</a> or <a href="../man3/MPI_Test.3.php">MPI_Test</a> means
that the communication is completed by the user and the buffer can be reused,
but does not guarantee that the local process has no more work to do. Similarly,
a successful return from <a href="../man3/MPI_Request_free.3.php">MPI_Request_free</a> with a request handle generated
by an <a href="../man3/MPI_Isend.3.php">MPI_Isend</a> nullifies the handle but does not guarantee that the operation
has completed. The <a href="../man3/MPI_Isend.3.php">MPI_Isend</a> is complete only when a matching receive has
completed.  <p>
If you would like to cause actions to happen when a process
finishes, attach an attribute to MPI_COMM_SELF with a callback function.
Then, when MPI_Finalize is called, it will first execute the equivalent
of an <a href="../man3/MPI_Comm_free.3.php">MPI_Comm_free</a> on MPI_COMM_SELF. This will cause the delete callback
function to be executed on all keys associated with MPI_COMM_SELF in an
arbitrary order. If no key has been attached to MPI_COMM_SELF, then no callback
is invoked. This freeing of MPI_COMM_SELF happens before any other parts
of MPI are affected. Calling <a href="../man3/MPI_Finalized.3.php">MPI_Finalized</a> will thus return "false" in any
of these callback functions. Once you have done this with MPI_COMM_SELF,
the results of MPI_Finalize are not specified.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines
return an error value; C routines as the value of the function and Fortran
routines in the last argument. C++ functions do not return errors. If the
default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error
the C++ exception mechanism will be used to throw an MPI:Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
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
<li><a name='toc5' href='#sect5'>Output Parameter</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Notes</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
