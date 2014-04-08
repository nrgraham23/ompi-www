<?php
$topdir = "../../..";
$title = "MPI_File_get_info(3) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: MPI_FILE_GET_INFO(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_File_get_info</b> - Returns a new info object containing values for
current hints associated with a file.
<p>
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>
<br>
<pre>C Syntax
    #include &lt;mpi.h&gt;
    int MPI_File_get_info(MPI_File fh, MPI_Info *info_used)
</pre>
<h2><a name='sect2' href='#toc2'>Fortran Syntax</a></h2>
<br>
<pre>    INCLUDE &rsquo;mpif.h&rsquo;
    MPI_FILE_GET_INFO(FH, INFO_USED, IERROR)
        <tt> </tt>&nbsp;<tt> </tt>&nbsp; INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;  FH, INFO_USED, IERROR
</pre>
<h2><a name='sect3' href='#toc3'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Info MPI::File::Get_info() const
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameter</a></h2>

<dl>

<dt>fh     </dt>
<dd>File handle (handle).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>info_used
</dt>
<dd>New info object (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p>
</dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
MPI_File_get_info returns a new info object containing all the
hints that the system currently associates with the file <i>fh</i>. The current
setting of all hints actually used by the system related to this open file
is returned in <i>info_used</i>. The user is responsible for freeing <i>info_used</i>
via <a href="../man3/MPI_Info_free.3.php">MPI_Info_free</a>.
<p> Note that the set of hints returned in <i>info_used</i> may
be greater or smaller than the set of hints passed in to <a href="../man3/MPI_File_open.3.php">MPI_File_open</a>,
<a href="../man3/MPI_File_set_view.3.php">MPI_File_set_view</a>, and <a href="../man3/MPI_File_set_info.3.php">MPI_File_set_info</a>, as the system may not recognize
some hints set by the user, and may automatically set other hints that
the user has not requested to be set. See the HINTS section for a list of
hints that can be set.
<p>
<h2><a name='sect7' href='#toc7'>Hints</a></h2>
The following hints can be used as values
for the <i>info_used</i> argument.  <p>
SETTABLE HINTS: <p>
- shared_file_timeout: Amount
of time (in seconds) to wait for access to the  shared file pointer before
exiting with MPI_ERR_TIMEDOUT. <p>
- rwlock_timeout: Amount of time (in seconds)
to wait for obtaining a read or  write lock on a contiguous chunk of a
UNIX file before exiting with MPI_ERR_TIMEDOUT. <p>
- noncoll_read_bufsize:
Maximum size of the buffer used by MPI I/O to satisfy  read requests in
the noncollective data-access routines. (See NOTE, below.) <p>
- noncoll_write_bufsize:
Maximum size of the buffer used by MPI I/O to satisfy write requests in
the noncollective data-access routines. (See NOTE, below.) <p>
- coll_read_bufsize:
 Maximum size of the buffer used by MPI I/O to satisfy read requests in
the collective data-access routines. (See NOTE, below.) <p>
- coll_write_bufsize:
 Maximum size of the buffer used by MPI I/O to satisfy write requests in
the collective data-access routines. (See NOTE, below.) <p>
NOTE: A buffer size
smaller than the distance (in bytes) in a UNIX file between the first byte
and the last byte of the access request causes MPI I/O to iterate and perform
multiple UNIX read() or write() calls. If the request includes multiple
noncontiguous chunks of data, and the buffer size is greater than the size
of those chunks, then the UNIX read() or write() (made at the MPI I/O level)
will access data not requested by this process in order to reduce the total
number of write() calls made. If this is not desirable behavior, you should
reduce this buffer size to equal the size of the contiguous chunks within
the aggregate request. <p>
- mpiio_concurrency: (boolean) controls whether nonblocking
I/O routines can bind an extra thread to an LWP. <p>
- mpiio_coll_contiguous:
(boolean) controls whether subsequent collective data accesses will request
collectively contiguous regions of the file. <p>
NON-SETTABLE HINTS:  <p>
- filename:
Access this hint to get the name of the file.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines
return an error value; C routines as the value of the function and Fortran
routines in the last argument. C++ functions do not return errors. If the
default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error
the C++ exception mechanism will be used to throw an MPI::Exception object.
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
<li><a name='toc2' href='#sect2'>Fortran Syntax</a></li>
<li><a name='toc3' href='#sect3'>C++ Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input Parameter</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Hints</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
