<?php
$topdir = "../../..";
$title = "MPI_Comm_get_parent(3) man page (version 1.5.5)";
$meta_desc = "Open MPI v1.5.5 man page: MPI_COMM_GET_PARENT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_get_parent</b> - Returns the parent intercommunicator of current
spawned process.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_get_parent(MPI_Comm *parent)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_GET_PARENT(PARENT, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;PARENT, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
static MPI::Intercomm MPI::Comm::Get_parent()
</pre>
<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>parent </dt>
<dd>The parent communicator (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran
only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
If a process was started with
<a href="../man3/MPI_Comm_spawn.3.php">MPI_Comm_spawn</a> or <a href="../man3/MPI_Comm_spawn_multiple.3.php">MPI_Comm_spawn_multiple</a>, MPI_Comm_get_parent returns
the "parent" intercommunicator of the current process. This parent intercommunicator
is created implicitly inside of <a href="../man3/MPI_Init.3.php">MPI_Init</a> and is the same intercommunicator
returned by the spawn call made in the parents.  <p>
If the process was not
spawned, MPI_Comm_get_parent returns MPI_COMM_NULL. <p>
After the parent communicator
is freed or disconnected, MPI_Comm_get_parent returns MPI_COMM_NULL.
<p>
<h2><a name='sect7' href='#toc7'>Notes</a></h2>
MPI_Comm_get_parent
returns a handle to a single intercommunicator. Calling MPI_Comm_get_parent
a second time returns a handle to the same intercommunicator. Freeing the
handle with <a href="../man3/MPI_Comm_disconnect.3.php">MPI_Comm_disconnect</a> or <a href="../man3/MPI_Comm_free.3.php">MPI_Comm_free</a> will cause other references
to the intercommunicator to become invalid (dangling). Note that calling
<a href="../man3/MPI_Comm_free.3.php">MPI_Comm_free</a> on the parent communicator is not useful.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all
MPI routines return an error value; C routines as the value of the function
and Fortran routines in the last argument. C++ functions do not return errors.
If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then
on error the C++ exception mechanism will be used to throw an MPI:Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<br>
<pre><a href="../man3/MPI_Comm_spawn.3.php">MPI_Comm_spawn</a>
<a href="../man3/MPI_Comm_spawn_multiple.3.php">MPI_Comm_spawn_multiple</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
