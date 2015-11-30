<?php
$topdir = "../../..";
$title = "MPI_Cart_get(3) man page (version 1.10.1)";
$meta_desc = "Open MPI v1.10.1 man page: MPI_CART_GET(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Cart_get</b> -  Retrieves Cartesian topology information associated
with a communicator.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Cart_get(MPI_Comm comm, int maxdims, int dims[], int periods[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int coords[])
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_CART_GET(COMM, MAXDIMS, DIMS, PERIODS, COORDS, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, MAXDIMS, DIMS(*), COORDS(*), IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL<tt> </tt>&nbsp;<tt> </tt>&nbsp;PERIODS(*)
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Cartcomm::Get_topo(int maxdims, int dims[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;bool periods[], int coords[]) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator with Cartesian structure (handle). </dd>

<dt>maxdims
</dt>
<dd>Length of vectors dims, periods, and coords in the calling program (integer).

<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>dims </dt>
<dd>Number of processes for each Cartesian dimension
(array of integers). </dd>

<dt>periods </dt>
<dd>Periodicity (true/false) for each Cartesian
dimension (array of logicals). </dd>

<dt>coords </dt>
<dd>Coordinates of calling process in
Cartesian structure (array of integers).  </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status
(integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
The functions <a href="../man3/MPI_Cartdim_get.3.php">MPI_Cartdim_get</a> and MPI_Cart_get return
the Cartesian topology information that was associated with a communicator
by <a href="../man3/MPI_Cart_create.3.php">MPI_Cart_create</a>.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value;
C routines as the value of the function and Fortran routines in the last
argument. C++ functions do not return errors. If the default error handler
is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception
mechanism will be used to throw an MPI::Exception object. <p>
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
<pre><a href="../man3/MPI_Cartdim_get.3.php">MPI_Cartdim_get</a>
<a href="../man3/MPI_Cart_create.3.php">MPI_Cart_create</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
