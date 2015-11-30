<?php
$topdir = "../../..";
$title = "MPI_Comm_set_info(3) man page (version 1.10.1)";
$meta_desc = "Open MPI v1.10.1 man page: MPI_COMM_SET_INFO(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_set_info</b> - Set communicator info hints
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_set_info(MPI_Comm comm, MPI_Info info)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_SET_INFO(COMM, INFO, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, INFO, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameters</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator on which to set info hints </dd>

<dt>info </dt>
<dd>Info
object containing hints to be set on <i>comm</i>  </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran
only: Error status (integer).   </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
MPI_COMM_SET_INFO sets new values
for the hints of the communicator associated with  <i>comm</i>. MPI_COMM_SET_INFO
is a collective routine. The info object may be different on each process,
but any info entries that an implementation requires to be the same on
all processes must appear with the same value in each process&rsquo;s  <i>info</i> object.

<h2><a name='sect7' href='#toc7'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. <p>
Before
the error value is returned, the current MPI error handler is called. By
default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<h2><a name='sect8' href='#toc8'>See Also</a></h2>
<a href="../man3/MPI_Comm_get_info.3.php">MPI_Comm_get_info</a>, <a href="../man3/MPI_Info_create.3.php">MPI_Info_create</a>, <a href="../man3/MPI_Info_set.3.php">MPI_Info_set</a>,
<a href="../man3/MPI_Info_free.3.php">MPI_Info_free</a> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input Parameters</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Errors</a></li>
<li><a name='toc8' href='#sect8'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
