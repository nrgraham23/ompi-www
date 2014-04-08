<?php
$topdir = "../../..";
$title = "MPI_Type_vector(3) man page (version 1.4.5)";
$meta_desc = "Open MPI v1.4.5 man page: MPI_TYPE_VECTOR(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Type_vector</b> - Creates a vector (strided) datatype.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Type_vector(int count, int blocklength, int stride,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype oldtype, MPI_Datatype *newtype)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_TYPE_VECTOR(COUNT, BLOCKLENGTH, STRIDE, OLDTYPE, NEWTYPE,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, BLOCKLENGTH, STRIDE, OLDTYPE
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;NEWTYPE, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
Datatype Datatype::Create_vector(int count, int blocklength,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int stride) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>count      </dt>
<dd>Number of blocks (nonnegative integer). </dd>

<dt>blocklength
      </dt>
<dd>Number of elements in each block (nonnegative integer). </dd>

<dt>stride
   </dt>
<dd>Number of elements between start of each block (integer). </dd>

<dt>oldtype
   </dt>
<dd>Old datatype (handle). <p>

<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>newtype       </dt>
<dd>New datatype (handle).
<p>
</dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
The function MPI_Type_vector
is a general constructor that allows replication of a datatype into locations
that consist of equally spaced blocks. Each block is obtained by concatenating
the same number of copies of the old datatype. The spacing between blocks
is a multiple of the extent of the old datatype. <p>
<b>Example 1:</b> Assume, again,
that oldtype has type map {(double, 0), (char, 8)}, with extent 16. A call
to  MPI_Type_vector(2, 3, 4, oldtype, newtype) will create the datatype
with type map  <br>
<pre>    {(double, 0), (char, 8), (double, 16), (char, 24),
    (double, 32), (char, 40),
    (double, 64), (char, 72),
    (double, 80), (char, 88), (double, 96), (char, 104)}
</pre><p>
That is, two blocks with three copies each of the old type, with a stride
of 4 elements (4 x 6 bytes) between the blocks.    <p>
<b>Example 2:</b>  A call to
 MPI_Type_vector(3, 1, -2, oldtype, newtype) will create the datatype <br>
<pre>    {(double, 0), (char, 8), (double, -32), (char, -24),
    (double, -64), (char, -56)}
</pre>In general, assume that oldtype has type map <br>
<pre>    {(type(0), disp(0)), ..., (type(n-1), disp(n-1))},
</pre>with extent ex. Let bl be the blocklength. The newly created datatype has
a type map with count x bl x  n entries: <br>
<pre>    {(type(0), disp(0)), ..., (type(n-1), disp(n-1)),
    (type(0), disp(0) + ex), ..., (type(n-1), disp(n-1) + ex), ...,
    (type(0), disp(0) + (bl -1) * ex),...,
    (type(n-1), disp(n-1) + (bl -1)* ex),
    (type(0), disp(0) + stride * ex),..., (type(n-1),
    disp(n-1) + stride * ex), ...,
    (type(0), disp(0) + (stride + bl - 1) * ex), ...,
    (type(n-1), disp(n-1) + (stride + bl -1) * ex), ...,
    (type(0), disp(0) + stride * (count -1) * ex), ...,
    (type(n-1), disp(n-1) + stride * (count -1) * ex), ...,
    (type(0), disp(0) + (stride * (count -1) + bl -1) * ex), ...,
    (type(n-1), disp(n-1) + (stride * (count -1) + bl -1) * ex)}
</pre>A call to <a href="../man3/MPI_Type_contiguous.3.php">MPI_Type_contiguous</a>(count, oldtype, newtype) is equivalent to
a call to MPI_Type_vector(count, 1, 1, oldtype, newtype), or to a call
to MPI_Type_vector(1, count, n, oldtype, newtype), n arbitrary.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. C++ functions do not
return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI:Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<a href="../man3/MPI_Type_create_hvector.3.php">MPI_Type_create_hvector</a> <br>
<a href="../man3/MPI_Type_hvector.3.php">MPI_Type_hvector</a> <br>

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
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
