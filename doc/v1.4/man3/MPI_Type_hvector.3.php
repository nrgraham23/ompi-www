<?php
$topdir = "../../..";
$title = "MPI_Type_hvector(3) man page (version 1.4.5)";
$meta_desc = "Open MPI v1.4.5 man page: MPI_TYPE_HVECTOR(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Type_hvector</b> - Creates a vector (strided) datatype with offset
in bytes -- use of this routine is deprecated.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Type_hvector(int count, int blocklength, MPI_Aint stride,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype oldtype, MPI_Datatype *newtype)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_TYPE_HVECTOR(COUNT, BLOCKLENGTH, STRIDE, OLDTYPE, NEWTYPE,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, BLOCKLENGTH, STRIDE, OLDTYPE
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;NEWTYPE, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameters</a></h2>

<dl>

<dt>count      </dt>
<dd>Number of blocks (nonnegative integer). </dd>

<dt>blocklength
      </dt>
<dd>Number of elements in each block (nonnegative integer). </dd>

<dt>stride
   </dt>
<dd>Number of bytes between start of each block (integer). </dd>

<dt>oldtype
</dt>
<dd>Old datatype (handle). <p>
</dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>newtype       </dt>
<dd>New datatype (handle).
</dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
Note that use
of this routine is <i>deprecated</i> as of MPI-2. Use <a href="../man3/MPI_Type_create_hvector.3.php">MPI_Type_create_hvector</a> instead.
 <p>
This deprecated routine is not available in C++.  <p>
The function MPI_Type_hvector
is identical to <a href="../man3/MPI_Type_vector.3.php">MPI_Type_vector</a>, except that stride is given in bytes,
rather than in elements. The use for both types of vector constructors is
illustrated in the examples in Section 3.12.7 of the MPI-1 Standard.  <p>
Assume
that oldtype has type map <p>
<br>
<pre>    {(type(0), disp(0)), ..., (type(n-1), disp(n-1))}
</pre><p>
with extent ex. Let bl be the blocklength. The newly created datatype has
a type map with   count * bl * n  entries: <p>
<br>
<pre>  {(type(0), disp(0)), ..., (type(n-1), disp(n-1)),
  (type(0), disp(0) + ex), ..., (type(n-1), disp(n-1) + ex),
  ..., (type(0), disp(0) + (bl -1) * ex),...,(type(n-1),
  disp(n-1) + (bl -1) * ex), (type(0), disp(0) + stride),
  ...,(type(n-1), disp(n-1) + stride), ..., (type(0),
  disp(0) + stride + (bl - 1) * ex), ..., (type(n-1),
  disp(n-1) + stride + (bl -1) * ex), ..., (type(0),
  disp(0) + stride * (count -1)), ...,(type(n-1),
  disp(n-1) + stride * (count -1)), ..., (type(0),
  disp(0) + stride * (count -1) + (bl -1) * ex), ...,
  (type(n-1), disp(n-1) + stride * (count -1) + (bl -1) * ex)}
</pre>
<h2><a name='sect7' href='#toc7'>Errors</a></h2>
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
<h2><a name='sect8' href='#toc8'>See Also</a></h2>
<p>
<a href="../man3/MPI_Type_create_hvector.3.php">MPI_Type_create_hvector</a> <br>
<a href="../man3/MPI_Type_vector.3.php">MPI_Type_vector</a> <br>

<p> <p>

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
