<?php
$topdir = "../../..";
$title = "MPI_Cart_shift(3) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: MPI_CART_SHIFT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Cart_shift </b> -  Returns the shifted source and destination ranks,
given a shift direction and amount.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Cart_shift(MPI_Comm comm, int direction, int disp,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int *rank_source, int *rank_dest)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_CART_SHIFT(COMM, DIRECTION, DISP, RANK_SOURCE,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;RANK_DEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, DIRECTION, DISP, RANK_SOURCE
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;RANK_DEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Cartcomm::Shift(int direction, int disp, int&amp; rank_source,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int&amp; rank_dest) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator with Cartesian structure (handle). </dd>

<dt>direction
</dt>
<dd>Coordinate dimension of shift (integer). </dd>

<dt>disp </dt>
<dd>Displacement ( &gt; 0: upward
shift, &lt; 0: downward shift) (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>rank_source </dt>
<dd>Rank
of source process (integer). </dd>

<dt>rank_dest </dt>
<dd>Rank of destination process (integer).
</dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
If the process
topology is a Cartesian structure, an <a href="../man3/MPI_Sendrecv.3.php">MPI_Sendrecv</a> operation is likely
to be used along a coordinate direction to perform a shift of data. As input,
<a href="../man3/MPI_Sendrecv.3.php">MPI_Sendrecv</a> takes the rank of a source process for the receive, and the
rank of a destination process for the send. If the function MPI_Cart_shift
is called for a Cartesian process group, it provides the calling process
with the above identifiers, which then can be passed to <a href="../man3/MPI_Sendrecv.3.php">MPI_Sendrecv</a>. The
user specifies the coordinate direction and the size of the step (positive
or negative). The function is local.  <p>
The direction argument indicates the
dimension of the shift, i.e., the coordinate whose value is modified by the
shift. The coordinates are numbered from 0 to ndims-1, where ndims is the
number of dimensions.  <p>
<b>Note:</b>  The direction argument is in the range [0,
n-1] for an n-dimensional Cartesian mesh.  <p>
Depending on the periodicity of
the Cartesian group in the specified coordinate direction, MPI_Cart_shift
provides the identifiers for a circular or an end-off shift. In the case
of an end-off shift, the value MPI_PROC_NULL may be returned in rank_source
or rank_dest, indicating that the source or the destination for the shift
is out of range. <p>
<b>Example:</b> The communicator, comm, has a two-dimensional,
periodic, Cartesian  topology associated with it. A two-dimensional array
of REALs is stored one element per process, in variable A. One wishes to
skew this array, by shifting column i (vertically, i.e., along the column)
by i steps.  <p>
<br>
<pre>  ....
  C find process rank
        CALL <a href="../man3/MPI_Comm_rank.3.php">MPI_COMM_RANK</a>(comm, rank, ierr))
  C find Cartesian coordinates
        CALL <a href="../man3/MPI_Cart_coords.3.php">MPI_CART_COORDS</a>(comm, rank, maxdims, coords,
                             ierr)
  C compute shift source and destination
        CALL MPI_CART_SHIFT(comm, 0, coords(2), source,
                            dest, ierr)
  C skew array
        CALL <a href="../man3/MPI_Sendrecv_replace.3.php">MPI_SENDRECV_REPLACE</a>(A, 1, MPI_REAL, dest, 0,
                                  source, 0, comm, status,
                                  ierr)
</pre>
<p>
<h2><a name='sect8' href='#toc8'>Note</a></h2>
In Fortran, the dimension indicated by DIRECTION = i has DIMS(i+1)
nodes, where DIMS is the array that was used to create the grid. In C, the
dimension indicated by direction = i is the dimension specified by dims[i].

<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. C++ functions
do not return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
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
<li><a name='toc8' href='#sect8'>Note</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
