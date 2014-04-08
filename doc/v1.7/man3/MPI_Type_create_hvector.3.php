<?php
$topdir = "../../..";
$title = "MPI_Type_create_hvector(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_TYPE_CREATE_HVECTOR(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Type_create_hvector</b> - Creates a vector (strided) data type with
offset in bytes.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Type_create_hvector(int count, int blocklength,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Aint stride, MPI_Datatype oldtype, MPI_Datatype *newtype)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_TYPE_CREATE_HVECTOR(COUNT, BLOCKLENGTH, STRIDE, OLDTYPE,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;NEWTYPE, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, BLOCKLENGTH, OLDTYPE, NEWTYPE, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) STRIDE
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Datatype MPI::Datatype::Create_hvector(int count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int blocklength, MPI::Aint stride) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>count </dt>
<dd>Number of blocks (nonnegative integer). </dd>

<dt>blocklength
</dt>
<dd>Number of elements in each block (nonnegative integer). </dd>

<dt>stride </dt>
<dd>Number of
bytes between start of each block (integer). </dd>

<dt>oldtype </dt>
<dd>Old data type (handle).

<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>newtype </dt>
<dd>New data type (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Type_create_hvector creates a vector
(strided) data type with offset in bytes.  <p>
NOTE - This routine replaces <a href="../man3/MPI_Type_hvector.3.php">MPI_Type_hvector</a>,
which is deprecated. See the man page <i><a href="../man3/MPI_Type_hvector.3.php">MPI_Type_hvector</a>(3)</i> for information
about that routine.
<p>
<h2><a name='sect8' href='#toc8'>Fortran 77 Notes</a></h2>
The MPI standard prescribes portable
Fortran syntax for the <i>STRIDE</i> argument only for Fortran 90.  FORTRAN 77
users may use the non-portable syntax <p>
<br>
<pre>     INTEGER*MPI_ADDRESS_KIND STRIDE
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
<a href="../man3/MPI_Type_hvector.3.php">MPI_Type_hvector</a> <br>
<a href="../man3/MPI_Type_vector.3.php">MPI_Type_vector</a> <br>
<p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Fortran 77 Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
