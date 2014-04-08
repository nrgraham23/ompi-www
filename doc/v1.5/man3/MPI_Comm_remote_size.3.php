<?php
$topdir = "../../..";
$title = "MPI_Comm_remote_size(3) man page (version 1.5.5)";
$meta_desc = "Open MPI v1.5.5 man page: MPI_COMM_REMOTE_SIZE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_remote_size </b> - Determines the size of the remote group associated
with an intercommunicator.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_remote_size(MPI_Comm comm, int *size)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_REMOTE_SIZE(COMM, SIZE, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, SIZE, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int Intercomm::Get_remote_size() const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameter</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>size </dt>
<dd>Number
of processes in the remote group of comm (integer). </dd>

<dt>IERROR </dt>
<dd>Fortran only:
Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Comm_remote_size determines the
size of the remote group associated with an intercommunicator. <p>
The  intercommunicator
accessors (<a href="../man3/MPI_Comm_test_inter.3.php">MPI_Comm_test_inter</a>, MPI_Comm_remote_size, <a href="../man3/MPI_Comm_remote_group.3.php">MPI_Comm_remote_group</a>)
are all local operations.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error
value; C routines as the value of the function and Fortran routines in
the last argument. C++ functions do not return errors. If the default error
handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception
mechanism will be used to throw an MPI:Exception object. <p>
Before the error
value is returned, the current MPI error handler is called. By default,
this error handler aborts the MPI job, except for I/O function errors. The
error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined
error handler MPI_ERRORS_RETURN may be used to cause error values to be
returned. Note that MPI does not guarantee that an MPI program can continue
past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<br>
<pre><a href="../man3/MPI_Comm_test_inter.3.php">MPI_Comm_test_inter</a>
<a href="../man3/MPI_Comm_remote_group.3.php">MPI_Comm_remote_group</a>
<a href="../man3/MPI_Intercomm_create.3.php">MPI_Intercomm_create</a>
<a href="../man3/MPI_Intercomm_merge.3.php">MPI_Intercomm_merge</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
