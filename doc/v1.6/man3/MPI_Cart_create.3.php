<?php
$topdir = "../../..";
$title = "MPI_Cart_create(3) man page (version 1.6.4)";
$meta_desc = "Open MPI v1.6.4 man page: MPI_CART_CREATE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Cart_create</b> - Makes a new communicator to which Cartesian topology
information has been attached.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Cart_create(MPI_Comm comm_old, int ndims, int *dims,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int *periods, int reorder, MPI_Comm *comm_cart)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_CART_CREATE(COMM_OLD, NDIMS, DIMS, PERIODS, REORDER,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM_CART, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM_OLD, NDIMS, DIMS(*), COMM_CART, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL<tt> </tt>&nbsp;<tt> </tt>&nbsp;PERIODS(*), REORDER
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
Cartcomm Intracomm::Create_cart(int ndims, const int dims[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const bool periods[], bool reorder) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>comm_old </dt>
<dd>Input communicator (handle). </dd>

<dt>ndims </dt>
<dd>Number of dimensions
of Cartesian grid (integer). </dd>

<dt>dims </dt>
<dd>Integer array of size ndims specifying
the number of processes in each dimension. </dd>

<dt>periods </dt>
<dd>Logical array of size
ndims specifying whether the grid is periodic (true) or not (false) in
each dimension. </dd>

<dt>reorder </dt>
<dd>Ranking may be reordered (true) or not (false) (logical).

<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>comm_cart </dt>
<dd>Communicator with new Cartesian topology (handle).
</dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Cart_create
returns a handle to a new communicator to which the Cartesian topology
information is attached. If reorder = false then the rank of each process
in the new group is identical to its rank in the old group. Otherwise, the
function may reorder the processes (possibly so as to choose a good embedding
of the virtual topology onto the physical machine). If the total size of
the Cartesian grid is smaller than the size of the group of comm, then
some processes are returned MPI_COMM_NULL, in analogy to <a href="../man3/MPI_Comm_split.3.php">MPI_Comm_split</a>.
The call is erroneous if it specifies a grid that is larger than the group
size.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value; C routines
as the value of the function and Fortran routines in the last argument.
C++ functions do not return errors. If the default error handler is set
to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
will be used to throw an MPI:Exception object. <p>
Before the error value is
returned, the current MPI error handler is called. By default, this error
handler aborts the MPI job, except for I/O function errors. The error handler
may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.

<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
