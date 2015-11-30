<?php
$topdir = "../../..";
$title = "MPI_Get(3) man page (version 1.10.1)";
$meta_desc = "Open MPI v1.10.1 man page: MPI_GET(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Get</b>, <b><a href="../man3/MPI_Rget.3.php">MPI_Rget</a></b> - Copies data from the target memory to the
origin.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI_Get(void *origin_addr, int origin_count, MPI_Datatype
<tt> </tt>&nbsp;<tt> </tt>&nbsp;origin_datatype, int target_rank, MPI_Aint target_disp,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int target_count, MPI_Datatype target_datatype, MPI_Win win)
<a href="../man3/MPI_Rget.3.php">MPI_Rget</a>(void *origin_addr, int origin_count, MPI_Datatype
<tt> </tt>&nbsp;<tt> </tt>&nbsp; origin_datatype, int target_rank, MPI_Aint target_disp,
<tt> </tt>&nbsp;<tt> </tt>&nbsp; int target_count, MPI_Datatype target_datatype, MPI_Win win,
         MPI_Request *request)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_GET(ORIGIN_ADDR, ORIGIN_COUNT, ORIGIN_DATATYPE, TARGET_RANK,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;TARGET_DISP, TARGET_COUNT, TARGET_DATATYPE, WIN, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt; ORIGIN_ADDR(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) TARGET_DISP
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER ORIGIN_COUNT, ORIGIN_DATATYPE, TARGET_RANK,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;TARGET_COUNT, TARGET_DATATYPE, WIN, IERROR
<a href="../man3/MPI_Rget.3.php">MPI_RGET</a>(ORIGIN_ADDR, ORIGIN_COUNT, ORIGIN_DATATYPE, TARGET_RANK,
<tt> </tt>&nbsp;<tt> </tt>&nbsp; TARGET_DISP, TARGET_COUNT, TARGET_DATATYPE, WIN, REQUEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp; &lt;type&gt; ORIGIN_ADDR(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp; INTEGER(KIND=MPI_ADDRESS_KIND) TARGET_DISP
<tt> </tt>&nbsp;<tt> </tt>&nbsp; INTEGER ORIGIN_COUNT, ORIGIN_DATATYPE, TARGET_RANK,
<tt> </tt>&nbsp;<tt> </tt>&nbsp; TARGET_COUNT, TARGET_DATATYPE, WIN, REQUEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Win::Get(const void *origin_addr, int origin_count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; origin_datatype, int target_rank,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI::Aint target_disp, int target_count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; target_datatype) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>origin_addr </dt>
<dd>Initial address of origin buffer (choice). </dd>

<dt>origin_count
</dt>
<dd>Number of entries in origin buffer (nonnegative integer).  </dd>

<dt>origin_datatype
</dt>
<dd>Data type of each entry in origin buffer (handle). </dd>

<dt>target_rank </dt>
<dd>Rank of target
(nonnegative integer). </dd>

<dt>target_disp </dt>
<dd>Displacement from window start to the
beginning of the target buffer (nonnegative integer).  </dd>

<dt>target_count </dt>
<dd>Number
of entries in target buffer (nonnegative integer). </dd>

<dt>target datatype </dt>
<dd>datatype
of each entry in target buffer (handle)  </dd>

<dt>win </dt>
<dd>window object used for communication
(handle)
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>request </dt>
<dd><a href="../man3/MPI_Rget.3.php">MPI_Rget</a>: RMA request </dd>

<dt>IERROR </dt>
<dd>Fortran
only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
<b>MPI_Get</b> copies data from the
target memory to the origin, similar to <a href="../man3/MPI_Put.3.php">MPI_Put</a>, except that the direction
of data transfer is reversed. The <i>origin_datatype</i> may not specify overlapping
entries in the origin buffer. The target buffer must be contained within
the target window, and the copied data must fit, without truncation, in
the origin buffer. Only processes within the same node can access the target
window. <p>

<p> <b><a href="../man3/MPI_Rget.3.php">MPI_Rget</a></b> is similar to <b>MPI_Get</b>, except that it allocates a communication
request object and associates it with the request handle (the argument
<i>request</i>) that can be used to wait or test for completion. The completion
of an <a href="../man3/MPI_Rget.3.php">MPI_Rget</a> operation indicates that the data is available in the origin
buffer. If <i>origin_addr</i> points to memory attached to a window, then the data
becomes available in the private copy of this window.
<p>
<h2><a name='sect8' href='#toc8'>Fortran 77 Notes</a></h2>
The
MPI standard prescribes portable Fortran syntax for the <i>TARGET_DISP</i> argument
only for Fortran 90. FORTRAN 77 users may use the non-portable syntax <p>
<br>
<pre>     INTEGER*MPI_ADDRESS_KIND TARGET_DISP
</pre><p>
where MPI_ADDRESS_KIND is a constant defined in mpif.h and gives the length
of the declared integer in bytes.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI::Exception object.
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
<a href="../man3/MPI_Put.3.php">MPI_Put</a>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameter</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Fortran 77 Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
