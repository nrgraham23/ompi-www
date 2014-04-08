<?php
$topdir = "../../..";
$title = "MPI_File_iwrite_at(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_FILE_IWRITE_AT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_File_iwrite_at</b> - Writes a file at an explicitly specified offset
(nonblocking, noncollective).
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>
<br>
<pre>C Syntax
    #include &lt;mpi.h&gt;
    int MPI_File_iwrite_at(MPI_File fh, MPI_Offset offset,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;      const void *buf, int count, MPI_Datatype datatype, MPI_Request *request)
</pre>
<h2><a name='sect2' href='#toc2'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>    INCLUDE &rsquo;mpif.h&rsquo;
    MPI_FILE_IWRITE_AT(FH, OFFSET, BUF, COUNT, DATATYPE, REQUEST, IERROR)
        <tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt; BUF(*)
        <tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;FH, COUNT, DATATYPE, REQUEST, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_OFFSET_KIND) OFFSET
</pre>
<h2><a name='sect3' href='#toc3'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Request MPI::File::Iwrite_at(MPI::Offset offset, const void* buf,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int count, const MPI::Datatype&amp; datatype)
</pre>
<h2><a name='sect4' href='#toc4'>Input/Output Parameter</a></h2>

<dl>

<dt>fh     </dt>
<dd>File handle (handle).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>offset
</dt>
<dd>File offset (integer). </dd>

<dt>buf </dt>
<dd>Initial address of buffer (choice). </dd>

<dt>count </dt>
<dd>Number
of elements in buffer (integer). </dd>

<dt>datatype </dt>
<dd>Data type of each buffer element
(handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>request </dt>
<dd>Request object (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran
only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_File_iwrite_at is a nonblocking
version of <a href="../man3/MPI_File_write_at.3.php">MPI_File_write_at</a>. It attempts to write into the file associated
with  <i>fh</i> (at the  <i>offset</i>  position) a total number of  <i>count</i>  data items
having <i>datatype</i>  type from the user&rsquo;s buffer  <i>buf.</i> The offset is in  <i>etype</i>
units relative to the current view. That is, holes are not counted when
locating an offset. The data is written into those parts of the file specified
by the current view. MPI_File_iwrite_at stores the number of  <i>datatype</i>
elements actually written in  <i>status.</i>  All other fields of  <i>status</i>  are
undefined. The request structure can be passed to <a href="../man3/MPI_Wait.3.php">MPI_Wait</a> or <a href="../man3/MPI_Test.3.php">MPI_Test</a>,
which will return a status with the number of bytes actually accessed.
<p>
It is erroneous to call this function if MPI_MODE_SEQUENTIAL mode was specified
when the file was open.
<p>
<h2><a name='sect8' href='#toc8'>Fortran 77 Notes</a></h2>
The MPI standard prescribes portable
Fortran syntax for the <i>OFFSET</i> argument only for Fortran 90.  FORTRAN 77
users may use the non-portable syntax <p>
<br>
<pre>     INTEGER*MPI_OFFSET_KIND OFFSET
</pre><p>
where MPI_OFFSET_KIND is a constant defined in mpif.h and gives the length
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
For MPI I/O function errors, the default error handler is set to MPI_ERRORS_RETURN.
The error handler may be changed with <a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>; the predefined
error handler MPI_ERRORS_ARE_FATAL may be used to make I/O errors fatal.
Note that MPI does not guarantee that an MPI program can continue past
an error.
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>Fortran Syntax (see FORTRAN 77 NOTES)</a></li>
<li><a name='toc3' href='#sect3'>C++ Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input/Output Parameter</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Fortran 77 Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
