<?php
$topdir = "../../..";
$title = "MPI_Win_shared_query(3) man page (version 2.0.0)";
$meta_desc = "Open MPI v2.0.0 man page: MPI_WIN_SHARED_QUERY(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Win_shared_query</b> - Query a shared memory window
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Win_shared_query (MPI_Win win, int rank, MPI_Aint *size,
                          int *disp_unit, void *baseptr)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_WIN_SHARED_QUERY(WIN, RANK, SIZE, DISP_UNIT, BASEPTR, IERROR)
        INTEGER WIN, RANK, DISP_UNIT, IERROR
        INTEGER(KIND=MPI_ADDRESS_KIND) SIZE, BASEPTR
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameters</a></h2>

<dl>

<dt>win </dt>
<dd>Shared memory window object (handle). </dd>

<dt>rank </dt>
<dd>Rank in the
group of window <i>win</i> (non-negative integer) or MPI_PROC_NULL.
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>size
</dt>
<dd>Size of the window segment (non-negative integer). </dd>

<dt>disp_unit </dt>
<dd>Local unit size
for displacements, in bytes (positive integer). </dd>

<dt>baseptr </dt>
<dd>Address for load/store
access to window segment (choice). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
<b>MPI_Win_shared_query</b> queries the process-local address for remote
memory segments created with <a href="../man3/MPI_Win_allocate_shared.3.php">MPI_Win_allocate_shared</a>. This function can
return different process-local addresses for the same physical memory on
different processes. The returned memory can be used for load/store accesses
subject to the constraints defined in MPI-3.1 [char167] 11.7. This function
can only be called with windows of flavor MPI_WIN_FLAVOR_SHARED. If the
passed window is not of flavor MPI_WIN_FLAVOR_SHARED, the error MPI_ERR_RMA_FLAVOR
is raised. When rank is MPI_PROC_NULL, the <i>pointer</i>, <i>disp_unit</i>, and <i>size</i>
returned are the pointer, disp_unit, and size of the memory segment belonging
the lowest rank that specified <i>size</i> &gt; 0. If all processes in the group attached
to the window specified <i>size</i> = 0, then the call returns <i>size</i> = 0 and a
<i>baseptr</i> as if <b><a href="../man3/MPI_Alloc_mem.3.php">MPI_Alloc_mem</a></b> was called with <i>size</i> = 0.
<p>
<h2><a name='sect7' href='#toc7'>Errors</a></h2>
Almost all
MPI routines return an error value; C routines as the value of the function
and Fortran routines in the last argument. <p>
Before the error value is returned,
the current MPI error handler is called. By default, this error handler
aborts the MPI job, except for I/O function errors. The error handler may
be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler MPI_ERRORS_RETURN
may be used to cause error values to be returned. Note that MPI does not
guarantee that an MPI program can continue past an error.
<p>
<h2><a name='sect8' href='#toc8'>See Also</a></h2>
<p>
<a href="../man3/MPI_Alloc_mem.3.php">MPI_Alloc_mem</a>
<a href="../man3/MPI_Win_allocate_shared.3.php">MPI_Win_allocate_shared</a> <p>

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
