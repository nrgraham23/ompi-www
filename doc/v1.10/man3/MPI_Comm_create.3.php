<?php
$topdir = "../../..";
$title = "MPI_Comm_create(3) man page (version 1.10.1)";
$meta_desc = "Open MPI v1.10.1 man page: MPI_COMM_CREATE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_create</b> - Creates a new communicator.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_create(MPI_Comm comm, MPI_Group group, MPI_Comm *newcomm)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_CREATE(COMM, GROUP, NEWCOMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, GROUP, NEWCOMM, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Intercomm MPI::Intercomm::Create(const Group&amp; group) const
MPI::Intracomm MPI::Intracomm::Create(const Group&amp; group) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameter</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator (handle). </dd>

<dt>group </dt>
<dd>Group, which is a subset
of the group of comm (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>newcomm </dt>
<dd>New communicator
(handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
This
function creates a new communicator newcomm with communication group defined
by group and a new context. The function sets <i>newcomm</i> to a new communicator
that spans all the processes that are in the group.  It sets <i>newcomm</i> to
MPI_COMM_NULL for processes that are not in the group.
<p> Each process must
call with a <i>group</i> argument that is a subgroup of the group associated with
<i>comm</i>; this could be MPI_GROUP_EMPTY. The processes may specify different
values for the <i>group</i> argument. If a process calls with a non-empty <i>group</i>,
then all processes in that group must call the function with the same <i>group</i>
as argument, that is: the same processes in the same order. Otherwise the
call is erroneous. <p>
<p>

<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
MPI_Comm_create provides a means of making a subset
of processes for the purpose of separate MIMD computation, with separate
communication space. <i>newcomm</i>, which is created by MPI_Comm_create, can be
used in subsequent calls to MPI_Comm_create (or other communicator constructors)
to further subdivide a computation into parallel sub-computations. A more
general service is provided by <a href="../man3/MPI_Comm_split.3.php">MPI_Comm_split</a>.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
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
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<p>
<a href="../man3/MPI_Comm_split.3.php">MPI_Comm_split</a> <p>
<a href="../man3/MPI_Intercomm_create.3.php">MPI_Intercomm_create</a> <a href="../man3/MPI_Comm_create_group.3.php">MPI_Comm_create_group</a>
<p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameter</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
