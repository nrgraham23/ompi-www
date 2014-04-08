<?php
$topdir = "../../..";
$title = "MPI_Comm_spawn(3) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: MPI_COMM_SPAWN(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_spawn</b> - Spawns a number of identical binaries.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_spawn(const char *command, char *argv[], int maxprocs,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Info info, int root, MPI_Comm comm,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Comm *intercomm, int array_of_errcodes[])
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_SPAWN(COMMAND, ARGV, MAXPROCS, INFO, ROOT, COMM,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTERCOMM, ARRAY_OF_ERRCODES, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;CHARACTER*(*) COMMAND, ARGV(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;INFO, MAXPROCS, ROOT, COMM, INTERCOMM,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;ARRAY_OF_ERRCODES(*), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Intercomm MPI::Intracomm::Spawn(const char* command,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const char* argv[], int maxprocs, const MPI::Info&amp; info,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int root, int array_of_errcodes[]) const
MPI::Intercomm MPI::Intracomm::Spawn(const char* command,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const char* argv[], int maxprocs, const MPI::Info&amp; info,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int root) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>command </dt>
<dd>Name of program to be spawned (string, significant
only at <i>root</i>). </dd>

<dt>argv </dt>
<dd>Arguments to <i>command</i> (array of strings, significant
only at <i>root</i>). </dd>

<dt>maxprocs </dt>
<dd>Maximum number of processes to start (integer, significant
only at <i>root</i>). </dd>

<dt>info </dt>
<dd>A set of key-value pairs telling the runtime system where
and how to start the processes (handle, significant only at <i>root</i>).  </dd>

<dt>root
</dt>
<dd>Rank of process in which previous arguments are examined (integer). </dd>

<dt>comm
</dt>
<dd>Intracommunicator containing group of spawning processes (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output
Parameter</a></h2>

<dl>

<dt>intercomm </dt>
<dd>Intercommunicator between original group and the newly
spawned group (handle). </dd>

<dt>array_of_errcodes </dt>
<dd>One code per process (array of
integers). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Comm_spawn
tries to start <i>maxprocs</i> identical copies of the MPI program specified by
<i>command</i>, establishing communication with them and returning an intercommunicator.
The spawned processes are referred to as children. The children have their
own MPI_COMM_WORLD, which is separate from that of the parents. MPI_Comm_spawn
is collective over <i>comm</i>, and also may not return until <a href="../man3/MPI_Init.3.php">MPI_Init</a> has been
called in the children. Similarly, <a href="../man3/MPI_Init.3.php">MPI_Init</a> in the children may not return
until all parents have called MPI_Comm_spawn. In this sense, MPI_Comm_spawn
in the parents and <a href="../man3/MPI_Init.3.php">MPI_Init</a> in the children form a collective operation
over the union of parent and child processes. The intercommunicator returned
by MPI_Comm_spawn contains the parent processes in the local group and
the child processes in the remote group. The ordering of processes in the
local and remote groups is the same as the as the ordering of the group
of the <i>comm</i> in the parents and of MPI_COMM_WORLD of the children, respectively.
This intercommunicator can be obtained in the children through the function
<a href="../man3/MPI_Comm_get_parent.3.php">MPI_Comm_get_parent</a>.  <p>
The MPI standard allows an implementation to use the
MPI_UNIVERSE_SIZE attribute of MPI_COMM_WORLD to specify the number of
processes that will be active in a program.  Although this implementation
of the MPI standard defines MPI_UNIVERSE_SIZE, it does not allow the user
to set its value.  If you try to set the value of MPI_UNIVERSE_SIZE, you
will get an error message. <p>
The <i>command</i> Argument  <p>
The <i>command</i> argument is
a string containing the name of a program to be spawned. The string is null-terminated
in C. In Fortran, leading and trailing spaces are stripped. MPI looks for
the file first in the working directory of the spawning process.  <p>
The <i>argv</i>
Argument <p>
<i>argv</i> is an array of strings containing arguments that are passed
to the program. The first element of <i>argv</i> is the first argument passed to
<i>command</i>, not, as is conventional in some contexts, the command itself. The
argument list is terminated by NULL in C and C++ and an empty string in
Fortran (note that it is the MPI application&rsquo;s responsibility to ensure
that the last entry of the  <i>argv</i>  array is an empty string; the compiler
will not automatically insert it). In Fortran, leading and trailing spaces
are always stripped, so that a string consisting of all spaces is considered
an empty string. The constant MPI_ARGV_NULL may be used in C, C++ and Fortran
to indicate an empty argument list. In C and C++, this constant is the same
as NULL. <p>
In C, the MPI_Comm_spawn argument <i>argv</i> differs from the <i>argv</i> argument
of <i>main</i> in two respects. First, it is shifted by one element. Specifically,
<i>argv</i>[0] of <i>main</i>  contains the name of the program (given by <i>command</i>). <i>argv</i>[1]
of <i>main</i> corresponds to <i>argv</i>[0] in MPI_Comm_spawn, <i>argv</i>[2] of <i>main</i> to <i>argv</i>[1]
of MPI_Comm_spawn, and so on. Second, <i>argv</i> of MPI_Comm_spawn must be null-terminated,
so that its length can be determined. Passing an <i>argv</i> of MPI_ARGV_NULL to
MPI_Comm_spawn results in <i>main</i> receiving <i>argc</i> of 1 and an <i>argv</i> whose element
0 is the name of the program.  <p>
The <i>maxprocs</i> Argument <p>
Open MPI tries to spawn
<i>maxprocs</i> processes. If it is unable to spawn <i>maxprocs</i> processes, it raises
an error of class MPI_ERR_SPAWN. If MPI is able to spawn the specified number
of processes, MPI_Comm_spawn returns successfully and the number of spawned
processes, <i>m</i>, is given by the size of the remote group of <i>intercomm</i>. <p>
A spawn
call with the default behavior is called hard. A spawn call for which fewer
than <i>maxprocs</i> processes may be returned is called soft.  <p>
The <i>info</i> Argument
 <p>
The <i>info</i> argument is an opaque handle of type MPI_Info in C, MPI::Info
in C++ and INTEGER in Fortran. It is a container for a number of user-speci
ed (<i>key,value</i>) pairs. <i>key</i> and <i>value</i> are strings (null-terminated char* in
C, character*(*) in Fortran). Routines to create and manipulate the <i>info</i>
argument are described in Section 4.10 of the MPI-2 standard.  <p>
For the SPAWN
calls, <i>info</i> provides additional, implementation-dependent instructions to
MPI and the runtime system on how to start processes. An application may
pass MPI_INFO_NULL in C or Fortran. Portable programs not requiring detailed
control over process locations should use MPI_INFO_NULL. <p>
The following keys
for <i>info</i> are recognized in Open MPI. (The reserved values mentioned in Section
5.3.4 of the MPI-2 standard are not implemented.) <p>
<br>
<pre>Key                    Type     Description
---                    ----     -----------
host                   char *   Host on which the process should be
                                spawned.  See the orte_host man
                                page for an explanation of how this
                                will be used.
hostfile               char *   Hostfile containing the hosts on which
                                the processes are to be spawned. See
                                the orte_hostfile man page for
                                an explanation of how this will be
                                used.
add-host               char *   Add the specified host to the list of
                                hosts known to this job and use it for
                                the associated process. This will be
                                used similarly to the -host option.
add-hostfile           char *   Hostfile containing hosts to be added
                                to the list of hosts known to this job
                                and use it for the associated
                                process. This will be used similarly
                                to the -hostfile option.
wdir                   char *   Directory where the executable is
                                located. If files are to be
                                pre-positioned, then this location is
                                the desired working directory at time
                                of execution - if not specified, then
                                it will automatically be set to
                                ompi_preload_files_dest_dir.
ompi_prefix            char *   Same as the --prefix command line
                                argument to mpirun.
ompi_preload_binary    bool     If set to true, pre-position the
                                specified executable onto the remote
                                host. A destination directory must
                                also be provided.
ompi_preload_files     char *   A comma-separated list of files that
                                are to be pre-positioned in addition
                                to the executable.  Note that this
                                option does not depend upon
                                ompi_preload_binary - files can
                                be moved to the target even if an
                                executable is not moved.
ompi_stdin_target   char* Comma-delimited list of ranks to
                                receive stdin when forwarded.
ompi_non_mpi           bool     If set to true, launching a non-MPI
                                application; the returned communicator
                                will be MPI_COMM_NULL. Failure to set
                                this flag when launching a non-MPI
                                application will cause both the child
                                and parent jobs to "hang".
ompi_param             char *   Pass an OMPI MCA parameter to the
                                child job.  If that parameter already
                                exists in the environment, the value
                                will be overwritten by the provided
                                value.
mapper                    char*  Mapper to be used for this job
map_by                    char*  Mapping directive indicating how
                                processes are to be mapped (slot,
                                node, socket, etc.).
rank_by                   char *  Ranking directive indicating how
                                processes are to be ranked (slot,
                                node, socket, etc.).
bind_to                    char *  Binding directive indicating how
                                processes are to be bound (core, slot,
                                node, socket, etc.).
path                         char*  List of directories to search for
                                the executable
npernode                 char* Number of processes to spawn on
                                each node of the allocation
pernode                   bool  Equivalent to npernode of 1
ppr                          char* Spawn specified number of processes
                               on each of the identified object type
env                         char*  Newline-delimited list of envars to
                               be passed to the spawned procs
</pre>
<p> <i>bool</i> info keys are actually strings but are evaluated as follows: if the
string value is a number, it is converted to an integer and cast to a boolean
(meaning that zero integers are false and non-zero values are true).  If
the string value is (case-insensitive) "yes" or "true", the boolean is true.
 If the string value is (case-insensitive) "no" or "false", the boolean
is false.  All other string values are unrecognized, and therefore false.
  <br>
 <p>
The <i>root</i> Argument <p>
All arguments before the <i>root</i> argument are examined
only on the process whose rank in <i>comm</i> is equal to <i>root</i>. The value of these
arguments on other processes is ignored.  <p>
The <i>array_of_errcodes</i> Argument
<p>
The <i>array_of_errcodes</i> is an array of length <i>maxprocs</i> in which MPI reports
the status of the processes that MPI was requested to start. If all <i>maxprocs</i>
processes were spawned, <i>array_of_errcodes</i> is filled in with the value MPI_SUCCESS.
If anyof the processes are <i>not</i> spawned, <i>array_of_errcodes</i> is filled in
with the value MPI_ERR_SPAWN. In C or Fortran, an application may pass MPI_ERRCODES_IGNORE
if it is not interested in the error codes. In C++ this constant does not
exist, and the <i>array_of_errcodes</i> argument may be omitted from the argument
list.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
Completion of MPI_Comm_spawn in the parent does not necessarily
mean that <a href="../man3/MPI_Init.3.php">MPI_Init</a> has been called in the children (although the returned
intercommunicator can be used immediately).
<p>
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines
return an error value; C routines as the value of the function and Fortran
routines in the last argument. C++ functions do not return errors. If the
default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error
the C++ exception mechanism will be used to throw an MPI::Exception object.
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
<br>
<pre><a href="../man3/MPI_Comm_spawn_multiple.3.php">MPI_Comm_spawn_multiple</a>(3)
<a href="../man3/MPI_Comm_get_parent.3.php">MPI_Comm_get_parent</a>(3)
mpirun(1)

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
