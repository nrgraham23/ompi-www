<?php
$topdir = "../../..";
$title = "MPI_Accumulate(3) man page (version 1.4.5)";
$meta_desc = "Open MPI v1.4.5 man page: MPI_ACCUMULATE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Accumulate </b> - Combines the contents of the origin buffer with
that of a target buffer.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Accumulate(void *origin_addr, int origin_count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype origin_datatype, int target_rank,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Aint target_disp, int target_count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype target_datatype, MPI_Op op, MPI_Win win)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_ACCUMULATE(ORIGIN_ADDR, ORIGIN_COUNT, ORIGIN_DATATYPE, TARGET_RANK,

<tt> </tt>&nbsp;<tt> </tt>&nbsp;TARGET_DISP, TARGET_COUNT, TARGET_DATATYPE, OP, WIN, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt; ORIGIN_ADDR(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) TARGET_DISP
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER ORIGIN_COUNT, ORIGIN_DATATYPE, TARGET_RANK, TARGET_COUNT,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;TARGET_DATATYPE, OP, WIN, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Win::Accumulate(const void* origin_addr, int origin_count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; origin_datatype, int target_rank,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI::Aint target_disp, int target_count, const MPI::Datatype&amp;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;target_datatype, const MPI::Op&amp; op) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>origin_addr </dt>
<dd>Initial address of buffer (choice). </dd>

<dt>origin_count
</dt>
<dd>Number of entries in buffer (nonnegative integer). </dd>

<dt>origin_datatype </dt>
<dd>Data
type of each buffer entry (handle). </dd>

<dt>target_rank </dt>
<dd>Rank of target (nonnegative
integer). </dd>

<dt>target_disp </dt>
<dd>Displacement from start of window to beginning of
target buffer (nonnegative integer).  </dd>

<dt>target_count </dt>
<dd>Number of entries in
target buffer (nonnegative integer).  </dd>

<dt>target_datatype </dt>
<dd>Data type of each
entry in target buffer (handle). </dd>

<dt>op </dt>
<dd>Reduce operation (handle).  </dd>

<dt>win </dt>
<dd>Window
object (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Accumulate is a function used for one-sided MPI communication
that adds the contents of the origin buffer (as defined by <i>origin_addr</i>,
<i>origin_count</i>, and <i>origin_datatype</i>) to the buffer specified by the arguments
<i>target_count</i> and <i>target_datatype</i>, at offset <i>target_disp</i>, in the target
window specified by <i>target_rank</i> and <i>win</i>, using the operation <i>op</i>. The target
window can only be accessed by processes within the same node. This is similar
to <a href="../man3/MPI_Put.3.php">MPI_Put</a>, except that data is combined into the target area instead of
overwriting it.  <p>
Any of the predefined operations for <a href="../man3/MPI_Reduce.3.php">MPI_Reduce</a> can be
used. User-defined functions cannot be used. For example, if <i>op</i> is MPI_SUM,
each element of the origin buffer is added to the corresponding element
in the target, replacing the former value in the target.  <p>
Each datatype
argument must be a predefined data type or a derived data type, where all
basic components are of the same predefined data type. Both datatype arguments
must be constructed from the same predefined data type. The operation <i>op</i>
applies to elements of that predefined type. The <i>target_datatype</i> argument
must not specify overlapping entries, and the target buffer must fit in
the target window.  <p>
A new predefined operation, MPI_REPLACE, is defined.
It corresponds to the associative function f(a, b) =b; that is, the current
value in the target memory is replaced by the value supplied by the origin.

<p>
<p>
<h2><a name='sect8' href='#toc8'>Fortran 77 Notes</a></h2>
The MPI standard prescribes portable Fortran syntax
for the <i>TARGET_DISP</i> argument only for Fortran 90.  FORTRAN 77 users may
use the non-portable syntax <p>
<br>
<pre>     INTEGER*MPI_ADDRESS_KIND TARGET_DISP
</pre><p>
where MPI_ADDRESS_KIND is a constant defined in mpif.h and gives the length
of the declared integer in bytes.
<p>
<h2><a name='sect9' href='#toc9'>Notes</a></h2>
<a href="../man3/MPI_Put.3.php">MPI_Put</a> is a special case of MPI_Accumulate,
with the operation MPI_REPLACE. Note, however, that <a href="../man3/MPI_Put.3.php">MPI_Put</a> and MPI_Accumulate
have different constraints on concurrent updates.  <p>
It is the user&rsquo;s responsibility
to guarantee that, when using the accumulate functions, the target displacement
argument is such that accesses to the window are properly aligned according
to the data type arguments in the call to the MPI_Accumulate function.
<p>

<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. C++ functions
do not return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI:Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect11' href='#toc11'>See Also</a></h2>
<p>
<a href="../man3/MPI_Put.3.php">MPI_Put</a>  <br>
<a href="../man3/MPI_Reduce.3.php">MPI_Reduce</a> <p>

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
<li><a name='toc9' href='#sect9'>Notes</a></li>
<li><a name='toc10' href='#sect10'>Errors</a></li>
<li><a name='toc11' href='#sect11'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
