<?php
$topdir = "../../..";
$title = "MPI_Comm_test_inter(3) man page (version 1.10.1)";
$meta_desc = "Open MPI v1.10.1 man page: MPI_COMM_TEST_INTER(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_test_inter </b> - Tests to see if a comm is an intercommunicator.

<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_test_inter(MPI_Comm comm, int *flag)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_TEST_INTER(COMM, FLAG, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL<tt> </tt>&nbsp;<tt> </tt>&nbsp;FLAG
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
bool Comm::Is_inter() const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameter</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>flag     (Logical.)
</dt>
<dd></dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
This local routine
allows the calling process to determine the type of a communicator. It returns
true for an intercommunicator, false for an intracommunicator.  <p>
The type
of communicator also affects the value returned by three other functions.
 When dealing with an intracommunicator (enables communication within a
single group), the functions listed below return the expected values, group
size, group, and rank.  When dealing with an inter-communicator, however,
they return the following values: <p>
<br>
<pre><a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a><tt> </tt>&nbsp;<tt> </tt>&nbsp;Returns the size of the local group.
<a href="../man3/MPI_Comm_group.3.php">MPI_Comm_group</a><tt> </tt>&nbsp;<tt> </tt>&nbsp;Returns the local group.
<a href="../man3/MPI_Comm_rank.3.php">MPI_Comm_rank</a><tt> </tt>&nbsp;<tt> </tt>&nbsp;Returns the rank in the local group.
</pre><p>
To return the remote group and remote group size of an inter-communicator,
use the <a href="../man3/MPI_Comm_remote_group.3.php">MPI_Comm_remote_group</a> and <a href="../man3/MPI_Comm_remote_size.3.php">MPI_Comm_remote_size</a> functions. <p>
The operation
<a href="../man3/MPI_Comm_compare.3.php">MPI_Comm_compare</a> is valid for intercommunicators. Both communicators must
be either intra- or intercommunicators, or else MPI_UNEQUAL results. Both
corresponding local and remote groups must compare correctly to get the
results MPI_CONGRUENT and MPI_SIMILAR. In particular, it is possible for
MPI_SIMILAR to result because either the local or remote groups were similar
but not identical.  <p>
The following accessors provide consistent access to
the remote group of an intercommunicator: <a href="../man3/MPI_Comm_remote_size.3.php">MPI_Comm_remote_size</a>, <a href="../man3/MPI_Comm_remote_group.3.php">MPI_Comm_remote_group</a>.
 <p>
The intercommunicator accessors (MPI_Comm_test_inter, <a href="../man3/MPI_Comm_remote_size.3.php">MPI_Comm_remote_size</a>,
<a href="../man3/MPI_Comm_remote_group.3.php">MPI_Comm_remote_group</a>) are all local operations.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines
return an error value; C routines as the value of the function and Fortran
routines in the last argument. C++ functions do not return errors. If the
default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error
the C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<br>
<pre><a href="../man3/MPI_Comm_remote_group.3.php">MPI_Comm_remote_group</a>
<a href="../man3/MPI_Comm_remote_size.3.php">MPI_Comm_remote_size</a>
<a href="../man3/MPI_Intercomm_create.3.php">MPI_Intercomm_create</a>
<a href="../man3/MPI_Intercomm_merge.3.php">MPI_Intercomm_merge</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
