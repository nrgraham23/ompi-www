<?php
$topdir = "../../..";
$title = "MPI_File_read_ordered_begin(3) man page (version 1.5.5)";
$meta_desc = "Open MPI v1.5.5 man page: MPI_FILE_READ_ORDERED_BEGIN(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_File_read_ordered_begin</b> - Reads a file at a location specified
by a shared file pointer; beginning part of a split collective routine
(nonblocking).
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>
<br>
<pre>C Syntax
    #include &lt;mpi.h&gt;
    int MPI_File_read_ordered_begin(MPI_File fh, void *buf,
    <tt> </tt>&nbsp;<tt> </tt>&nbsp;      int count, MPI_Datatype datatype)
</pre>
<h2><a name='sect2' href='#toc2'>Fortran Syntax</a></h2>
<br>
<pre>    INCLUDE &rsquo;mpif.h&rsquo;
    MPI_FILE_READ_ORDERED_BEGIN(FH, BUF, COUNT, DATATYPE, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;BUF(*)
        <tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;FH, COUNT, DATATYPE, IERROR
</pre>
<h2><a name='sect3' href='#toc3'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::File::Read_ordered_begin(void* buf, int count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; datatype)
</pre>
<h2><a name='sect4' href='#toc4'>Input/Output Parameter</a></h2>

<dl>

<dt>fh     </dt>
<dd>File handle (handle).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>count
</dt>
<dd>Number of elements in buffer (integer). </dd>

<dt>datatype </dt>
<dd>Data type of each buffer
element (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>buf </dt>
<dd>Initial address of buffer (choice).
</dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_File_read_ordered_begin
is the beginning part of a split collective, nonblocking routine that must
be called by all processes in the communicator group associated with the
file handle  <i>fh.</i> Each process may pass different argument values for the
 <i>datatype</i>  and  <i>count</i>  arguments. Each process attempts to read, from the
file associated with  <i>fh,</i> a total number of  <i>count</i>  data items having
<i>datatype</i>  type into the user&rsquo;s buffer  <i>buf.</i> For each process, the location
in the file at which data is read is the position at which the shared file
pointer would be after all processes whose ranks within the group are less
than that of this process had read their data.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
All the nonblocking
collective routines for data access are "split" into two routines, each
with _begin or _end as a suffix. These split collective routines are subject
to the semantic rules described in Section 9.4.5 of the MPI-2 standard.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. C++ functions do not
return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI:Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. For MPI I/O function errors, the default error handler is set
to MPI_ERRORS_RETURN. The error handler may be changed with <a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>;
the predefined error handler MPI_ERRORS_ARE_FATAL may be used to make I/O
errors fatal. Note that MPI does not guarantee that an MPI program can continue
past an error.
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>Fortran Syntax</a></li>
<li><a name='toc3' href='#sect3'>C++ Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input/Output Parameter</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
