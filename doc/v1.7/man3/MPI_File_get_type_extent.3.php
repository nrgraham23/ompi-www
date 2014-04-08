<?php
$topdir = "../../..";
$title = "MPI_File_get_type_extent(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_FILE_GET_TYPE_EXTENT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_File_get_type_extent</b> - Returns the extent of the data type in
a file.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>
<br>
<pre>C Syntax
    #include &lt;mpi.h&gt;
    int MPI_File_get_type_extent(MPI_File fh, MPI_Datatype
    <tt> </tt>&nbsp;<tt> </tt>&nbsp;      datatype, MPI_Aint *extent)
</pre>
<h2><a name='sect2' href='#toc2'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>    INCLUDE &rsquo;mpif.h&rsquo;
    MPI_FILE_GET_TYPE_EXTENT(FH, DATATYPE, EXTENT,  IERROR)
        <tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;FH, DATATYPE, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) EXTENT
</pre>
<h2><a name='sect3' href='#toc3'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Aint MPI::File::Get_type_extent(const MPI::Datatype&amp;
<tt> </tt>&nbsp;<tt> </tt>&nbsp;datatype) const
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameters</a></h2>

<dl>

<dt>fh </dt>
<dd>File handle (handle). </dd>

<dt>datatype </dt>
<dd>Data type (handle).
<p>
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output
Parameters</a></h2>

<dl>

<dt>extent </dt>
<dd>Data type extent (integer).  </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
MPI_File_get_type_extent can be used to calculate
<i>extent</i> for <i>datatype</i> in the file. The extent is the same for all processes
accessing the file associated with <i>fh</i>. If the current view uses a user-defined
data representation, MPI_File_get_type_extent uses the <i>dtype_file_extent_fn</i>
callback to calculate the extent.
<p>
<h2><a name='sect7' href='#toc7'>Fortran 77 Notes</a></h2>
The MPI standard prescribes
portable Fortran syntax for the <i>EXTENT</i> argument only for Fortran 90. FORTRAN
77 users may use the non-portable syntax <p>
<br>
<pre>     INTEGER*MPI_ADDRESS_KIND EXTENT
</pre><p>
where MPI_ADDRESS_KIND is a constant defined in mpif.h and gives the length
of the declared integer in bytes.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
If the file data representation
is other than "native," care must be taken in constructing etypes and file
types. Any of the data-type constructor functions may be used; however, for
those functions that accept displacements in bytes, the displacements must
be specified in terms of their values in the file for the file data representation
being used. MPI will interpret these byte displacements as is; no scaling
will be done. The function MPI_File_get_type_extent can be used to calculate
the extents of data types in the file. For etypes and  file types that are
portable data types, MPI will scale any displacements in the data types
to match the file data representation. Data types passed as arguments to
read/write routines specify the data layout in memory; therefore, they
must always be constructed using displacements corresponding to displacements
in memory.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value; C routines
as the value of the function and Fortran routines in the last argument.
C++ functions do not return errors. If the default error handler is set
to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
will be used to throw an MPI::Exception object. <p>
Before the error value is
returned, the current MPI error handler is called. For MPI I/O function
errors, the default error handler is set to MPI_ERRORS_RETURN. The error
handler may be changed with <a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>; the predefined error
handler MPI_ERRORS_ARE_FATAL may be used to make I/O errors fatal. Note
that MPI does not guarantee that an MPI program can continue past an error.

<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>Fortran Syntax (see FORTRAN 77 NOTES)</a></li>
<li><a name='toc3' href='#sect3'>C++ Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input Parameters</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Fortran 77 Notes</a></li>
<li><a name='toc8' href='#sect8'>Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
