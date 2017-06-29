# -*- coding: utf-8 -*-
from __future__ import unicode_literals
from firebase import firebase
import MySQLdb
import json
class Busqueda(object):
        """docstring for ClassName"""
        def comparacion(arg):
                db = MySQLdb.connect(host="localhost", user="root", passwd="250901", db="acceso")

                #create a cursor for the select
                a = False

                cur = db.cursor()

                #execute an sql query
                cur.execute("SELECT * FROM acceso.residentes")

                ##Iterate 
                for row in cur.fetchall() :
                      #data from rows
                      #print
                        if (row[0]==arg):
                                if  row[1]==1:
                                        a=True
                                        break
                # close the cursor
                cur.close()

                # close the connection
                db.close ()

                return a

        def qr():
                db = MySQLdb.connect(host="localhost", user="root", passwd="250901", db="acceso")

                #create a cursor for the select
                a = False

                cur = db.cursor()

                #execute an sql query
                cur.execute("SELECT * FROM acceso.invitado")

                ##Iterate 
                for row in cur.fetchall() :
                      #data from rows
                      #print
                        if (row[0]==arg):
                                if  row[1]==1:
                                        a=True
                                        break
                # close the cursor
                cur.close()

                # close the connection
                db.close ()

                return a

        def fire(tag):
                from firebase import firebase
                from conect import comparacion
                try:
                        firebase = firebase.FirebaseApplication('https://controlacceso-2e26e.firebaseio.com/', None)
                        result = firebase.get('/users', str(tag))
                        result =json.dumps(result)
                        #print(result)
                        decoded = json.loads(result)
                        #print 'DECODED:', decoded
                        if decode['activo'] == 1 :
                                return True
                        else:
                                return False
                except:
                        return comparacion(tag)

                
        print(fire(43456586))

                
