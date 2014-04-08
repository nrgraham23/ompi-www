<?php
$topdir = "../../..";
$title = "MPI_Comm_disconnect(3) man page (version 1.5.5)";
$meta_desc = "Open MPI v1.5.5 man page: MPI_COMM_DISCONNECT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_disconnect</b> - Deallocates communicator object and sets handle
to MPI_COMM_NULL.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_disconnect(MPI_Comm *comm)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_DISCONNECT(COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Comm::Disconnect()
</pre>
<h2><a name='sect5' href='#toc5'>Input/Output Parameter</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Comm_disconnect waits
for all pending communication on <i>comm</i> to complete internally, deallocates
the communicator object, and sets the handle to MPI_COMM_NULL. It is a collective
operation.  <p>
It may not be called with the communicator MPI_COMM_WORLD or
MPI_COMM_SELF. <p>
MPI_Comm_disconnect may be called only if all communication
is complete and matched, so that buffered data can be delivered to its
destination. This requirement is the same as for <a href="../man3/MPI_Finalize.3.php">MPI_Finalize</a>.  <p>
MPI_Comm_disconnect
has the same action as <a href="../man3/MPI_Comm_free.3.php">MPI_Comm_free</a>, except that it waits for pending
communication to finish internally and enables the guarantee about the
behavior of disconnected processes.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
To disconnect two processes you
may need to call MPI_Comm_disconnect, <a href="../man3/MPI_Win_free.3.php">MPI_Win_free</a>, and <a href="../man3/MPI_File_close.3.php">MPI_File_close</a>
to remove all communication paths between the two processes. Note that it
may be necessary to disconnect several communicators (or to free several
windows or files) before two processes are completely independent.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. C++ functions do not
return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI:Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<p>
<a href="../man3/MPI_Comm_connect.3.php">MPI_Comm_connect</a> <br>
<a href="../man3/MPI_Comm_accept.3.php">MPI_Comm_accept</a> <br>
<p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input/Output Parameter</a></li>
<li><a name='toc6' href='#sect6'>Output Parameter</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
